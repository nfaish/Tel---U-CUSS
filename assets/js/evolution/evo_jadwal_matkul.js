//Fungsi untuk Persiapan Individu
function generateIndividual() {
    let new_indv = [];

    for (let idx = 0; idx < data_preferensi_dosen.length; idx++) {

        data_preferensi_dosen[idx]['possible_sks'] = setPossibleSks(data_preferensi_dosen[idx]);
        data_preferensi_dosen[idx]['shift_selected'] = shift_zeros();
        if (group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] == undefined) {
            group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] = [];
        }
        group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']].push(data_preferensi_dosen[idx]);
    }

    for (let idx = 0; idx < data_class_requirement.length; idx++) {
        let cari_matkul = data_class_requirement[idx]["id_matkul"];

        if (group_pref_per_matkul[cari_matkul] == undefined) {
            uncomplete_data_matkul.push(cari_matkul);
            data_class_requirement[idx]["pref"] = false;
            new_indv.push(data_class_requirement[idx]["pref"]);

        } else {

            let list_option_prefs = filterChancePref(cari_matkul);

            if (list_option_prefs.length == 0) {
                data_class_requirement[idx]["pref"] = false;
            } else {

                let random_idx = list_option_prefs[Math.floor(Math.random() * list_option_prefs.length)];

                let random_pref = group_pref_per_matkul[cari_matkul][random_idx];
                random_pref = takeOneTime(random_pref);
                
                if (random_pref != false){
                    
                    group_pref_per_matkul[cari_matkul][random_idx] = random_pref;

                    data_preferensi_dosen[parseInt(random_pref["no"])] = random_pref;
                    data_class_requirement[idx]["pref"] = parseInt(random_pref["no"]);
                }else{
                    data_class_requirement[idx]["pref"] = random_pref;
                }

            }

            new_indv.push(data_class_requirement[idx]["pref"]);

        }
    }
    return new_indv;
};


//Fungsi untuk Mencari Nilai Fitness 
function getFitness(indv) {
    let unique = indv.filter((item, i, ar) => ar.indexOf(item) === i);
    let err = indv.filter(element => element === false);

    for (let idx = 0; idx < data_class_requirement.length; idx++) {
        data_class_requirement[idx]["pref"] = data_preferensi_dosen[indv[idx]];
    }
    let dengan_ruang = setRuangan();
    let problem = dengan_ruang.filter(element => element["pref"]["room_shift"] === undefined);
    
    return calculateErrorFitness([err, unique, problem]);
}

function calculateErrorFitness(score) {
    return 1.0 / (1.0 + (sum_arr(score)));
}

function sum_arr(arrays) {
    let total_sum = 0;
    for (let arr_idx = 0; arr_idx < arrays.length; arr_idx++) {
        // for (let el_idx = 0; el_idx < arrays[arr_idx].length; el_idx++) {
            // total_sum += arrays[arr_idx][el_idx];
            total_sum += arrays[arr_idx].length;
        // }

    }
    return total_sum;
}

//Fungsi untuk Melakukan Proses Mutasi
function mutate(indv) {

    let new_indv = [];

    for (let idx = 0; idx < data_preferensi_dosen.length; idx++) {

        data_preferensi_dosen[idx]['possible_sks'] = setPossibleSks(data_preferensi_dosen[idx]);
        data_preferensi_dosen[idx]['shift_selected'] = shift_zeros();
        if (group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] == undefined) {
            group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] = [];
        }
        group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']].push(data_preferensi_dosen[idx]);
    }

    for (let idx = 0; idx < data_class_requirement.length; idx++) {
        data_class_requirement[idx]["pref"] = data_preferensi_dosen[indv[idx]];
    }

    for (let idx = 0; idx < data_class_requirement.length; idx++) {
        let cari_matkul = data_class_requirement[idx]["id_matkul"];

        if (group_pref_per_matkul[cari_matkul] == undefined) {
            uncomplete_data_matkul.push(cari_matkul);
            data_class_requirement[idx]["pref"] = false;
            new_indv.push(data_class_requirement[idx]["pref"]);

        } else {

            let list_option_prefs = filterChancePref(cari_matkul);

            if (list_option_prefs.length == 0) {
                data_class_requirement[idx]["pref"] = false;
            } else {

                let random_idx = list_option_prefs[Math.floor(Math.random() * list_option_prefs.length)];

                let random_pref = group_pref_per_matkul[cari_matkul][random_idx];
                random_pref = takeOneTime(random_pref);
                
                if (random_pref != false){
                    
                    group_pref_per_matkul[cari_matkul][random_idx] = random_pref;

                    data_preferensi_dosen[parseInt(random_pref["no"])] = random_pref;
                    data_class_requirement[idx]["pref"] = parseInt(random_pref["no"]);
                }else{
                    data_class_requirement[idx]["pref"] = random_pref;
                }

            }

            new_indv.push(data_class_requirement[idx]["pref"]);

        }
    }
    // console.log("indv",indv,"new_indv",new_indv);
    return new_indv;

}

//Pemanggilan Fungsi Utama
function generateInit() {
    // Create a toolbox
    var toolbox = new Toolbox();
    toolbox.genIndv = generateIndividual;
    toolbox.getFitness = getFitness;
    toolbox.goalFitness = Toolbox.fitnessMax;
    toolbox.mutate = mutate;

    // Create parameters
    var popSize = num_kromosom;
    var mutProb = mutation_rate;
    var generations = max_generation;

    // Create evolution algorithm and evolve individuals
    var gen = new EvolutionarryAlgorithm(toolbox, popSize, mutProb, Algorithms.crossBreed, true);

    results = gen.evolve(generations);
    console.log("Result Evolution:", results);
    // console.log("result", results);

    result_sets = [];

    for (let idx_pop = 0; idx_pop < results.population.length; idx_pop++) {
        result_sets.push(generateResult(idx_pop, true));
        
    }

    // generateResult();

}

function setPossibleSks(preferensi_) {
    let set_possible = [];
    for (let index = 13; index > 0; index--) {
        if (preferensi_["shift" + index] == "1") {
            if (index != 13) {
                if (set_possible[index] != 0) {
                    set_possible[parseInt(index - 1)] = set_possible[index] + 1;
                } else {
                    set_possible[parseInt(index - 1)] = 1;
                }
            } else {
                set_possible[parseInt(index - 1)] = 1;
            }
        } else {
            set_possible[parseInt(index - 1)] = 0;
        }

    }
    set_possible = requiredPossibleSks(set_possible);
    return set_possible;
}

function requiredPossibleSks(possible_sks) {
    let new_possible = [];
    for (let index = 0; index < possible_sks.length; index++) {
        if (unique_sks.includes(possible_sks[index])) {
            new_possible.push(possible_sks[index]);
        } else {
            new_possible.push(0);
        }
    }
    return new_possible;
}

function shift_zeros() {
    let arr_zeros = [];
    for (let i = 0; i < 13; i++) {
        arr_zeros[i] = 0;
    }
    return arr_zeros;
}

function sumArr(arr) {
    var res = 0;
    for (var i = 0; i < arr.length; i++) {
        res += arr[i];
    }
    return res;
}

function checkChance(pref) {
    for (let pos_idx = 0; pos_idx < pref["possible_sks"].length; pos_idx++) {
        if (parseInt(pref["sks"]) == pref["possible_sks"][pos_idx]) {
            if (sumArr(pref["shift_selected"].slice(pos_idx, pos_idx + parseInt(pref["sks"]))) == 0) {
                return true;
            }
        }
    }
    return false;
}

function takeOneTime(pref) {
    for (let pos_idx = 0; pos_idx < pref["possible_sks"].length; pos_idx++) {
        if (parseInt(pref["sks"]) == pref["possible_sks"][pos_idx]) {
            if (sumArr(pref["shift_selected"].slice(pos_idx, pos_idx + parseInt(pref["sks"]))) == 0) {
                pref["shift_selected"][pos_idx] = 1;
                return pref;
            }
        }
    }
    return false;
}

function takeOneShiftRoom(pref) {
    for (let pos_idx = 0; pos_idx < pref["shift_selected"].length; pos_idx++) {
        if (parseInt(pref["shift_selected"][pos_idx]) == 1) {
            pref["shift_selected"][pos_idx] = 0;
            pref["room_shift"] = pos_idx;
            return pref;
        }
    }
    return pref;
}

function filterChancePref(groups_matkul_id) {
    let pref_chance_list = [];
    for (let pref_idx = 0; pref_idx < group_pref_per_matkul[groups_matkul_id].length; pref_idx++) {
        let selected_pref = group_pref_per_matkul[groups_matkul_id][pref_idx];
        if (checkChance(selected_pref)) {
            pref_chance_list.push(pref_idx);
        }
    }
    return pref_chance_list;
}

function setRuangan() {
    // let class_preffed = data_class_requirement.filter(element => element['pref'] != undefined && element['pref']["room_shift"] != false);
    let class_preffed = data_class_requirement.filter(element => element['pref'] != undefined);
    let group_ruangan = [];
    for (let idx_ruang = 0; idx_ruang < data_ruangan.length; idx_ruang++) {

        if (group_ruangan[data_ruangan[idx_ruang]['id_jurusan']] == undefined) {
            group_ruangan[data_ruangan[idx_ruang]['id_jurusan']] = [];
        }

        data_ruangan[idx_ruang]["scheduled"] = [];
        data_ruangan[idx_ruang]["no"] = idx_ruang;
        group_ruangan[data_ruangan[idx_ruang]['id_jurusan']].push(data_ruangan[idx_ruang]);

    }

    for (let class_idx = 0; class_idx < class_preffed.length; class_idx++) {

        let res_take = takeOneShiftRoom(class_preffed[class_idx]["pref"]);
        

        if(res_take["room_shift"] == undefined){
            arr = class_preffed.filter(element => element['pref']["id_preferensi"] == class_preffed[class_idx]['pref']["id_preferensi"]);
            console.log("Problem :", res_take, arr);
            class_preffed[class_idx]["pref"] = false;
            // continue;
        }else{
            class_preffed[class_idx]["pref"] = res_take;
        }

        let ruangan_selection = group_ruangan[class_preffed[class_idx]["id_jurusan"]];
        ruangan_selection = ruangan_selection.filter(element => !element["scheduled"].includes([class_preffed[class_idx]["pref"]["id_hari"], class_preffed[class_idx]["pref"]["id_hari"]]));

        let random_ruangan = ruangan_selection[Math.floor(Math.random() * ruangan_selection.length)];
        class_preffed[class_idx]["ruangan"] = random_ruangan;

        let update_ruang_scheduled = data_ruangan.filter(element => element["id_ruangan"] == random_ruangan["id_ruangan"]);
        for (let urs_idx = 0; urs_idx < update_ruang_scheduled.length; urs_idx++) {
            data_ruangan[update_ruang_scheduled[urs_idx]["no"]]["scheduled"].push([class_preffed[class_idx]["pref"]["id_hari"], class_preffed[class_idx]["pref"]["room_shift"]]);
        }

    }
    return class_preffed;
}

function save_jadwal(){
    let curr_page = parseInt(document.getElementById("res_number").innerHTML);
    document.getElementById("btnSave").disabled = true;
    let data_with_ruang = result_sets[curr_page-1];
    deleteAll();
    for (let index = 0; index < data_with_ruang.length; index++) {
        let jadwal = {
            id_mengajar: data_with_ruang[index]['pref']['id_mengajar'],
            id_preferensi: data_with_ruang[index]['pref']['id_preferensi'],
            id_ruangan: data_with_ruang[index]['ruangan']['id_ruangan'],
            id_perkuliahan: data_with_ruang[index]['id_perkuliahan'],
            id_kelas: data_with_ruang[index]['id_kelas'],
            kode_jam : parseInt(data_with_ruang[index]["pref"]["room_shift"]) + 1
        }
        save_row(jadwal);
    }
    setTimeout(() => {  window.location.replace(next_link); }, 15000);
    
}

function deleteAll(){
    $.post(delete_link);
}

function save_row(jadwal){
    $.post(save_link,  
        {
            id_mengajar: jadwal['id_mengajar'],
            id_preferensi: jadwal['id_preferensi'],
            id_ruangan: jadwal['id_ruangan'],
            id_perkuliahan: jadwal['id_perkuliahan'],
            id_kelas: jadwal['id_kelas'],
            kode_jam: jadwal['kode_jam']
        }
    );
}

function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}

function generateResult(selected_pop = 0, set_ruang=false) {

    let data_with_ruang;

    if(set_ruang){
        for (let idx = 0; idx < data_class_requirement.length; idx++) {
            data_class_requirement[idx]["pref"] = data_preferensi_dosen[results.population[selected_pop]["individual"][idx]];
        }
    
        console.log("uncomplete_data_matkul", uncomplete_data_matkul);
        console.log("data_class_requirement", data_class_requirement);
        console.log("group_pref_per_matkul", group_pref_per_matkul);
    
        data_with_ruang = setRuangan();
    }else{
        data_with_ruang = result_sets[selected_pop];
    }
    
    let jumlah_data;
    let jumlah_kelas;
    let jumlah_jurusan;
    let jumlah_ruangan;
    let jumlah_dosen;
    
    data_with_ruang.sort(
        function(a, b) {          
           if (parseInt(a['pref']['id_hari']) === parseInt(b['pref']['id_hari']) ) {
              // Price is only important when cities are the same
              return parseInt(a["pref"]["room_shift"]) - parseInt(b["pref"]["room_shift"]);
           }
           return parseInt(a['pref']['id_hari']) >parseInt(b['pref']['id_hari']) ? 1 : -1;
        });

    console.log(data_with_ruang);

    let hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    let str_to_html = 
    '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">' +
        '<thead>' +
            '<tr>' +
                '<th scope="col">NO</th>' +
                '<th scope="col">HARI</th>' +
                '<th scope="col">JAM</th>' +
                '<th scope="col">FAKULTAS</th>' +
                '<th scope="col">PROGRAM STUDI</th>' +
                '<th scope="col">Matkul</th>' +
                '<th scope="col">RUANG</th>' +
                '<th scope="col">KELAS</th>' +
                '<th scope="col">DOSEN</th>' +
            '</tr>' +
        '</thead>' +
        '<tbody>';

    for (let idx_dwr = 0; idx_dwr < data_with_ruang.length; idx_dwr++) {
        // if(data_with_ruang[idx_dwr]['pref'] == false){
        //     continue;
        // }

        let hari = hari_list[parseInt(data_with_ruang[idx_dwr]['pref']['id_hari']) - 1];
        let jam_mulai = parseInt(data_with_ruang[idx_dwr]["pref"]["room_shift"]) + 6;
        let jam_selesai = jam_mulai + parseInt(data_with_ruang[idx_dwr]["sks"]);
        let nama_fakultas = data_with_ruang[idx_dwr]["ruangan"]["nama_fakultas"];
        let nama_jurusan = data_with_ruang[idx_dwr]["nama_jurusan"];
        let matkul = data_with_ruang[idx_dwr]['nama_matkul'];
        let ruangan = data_with_ruang[idx_dwr]["ruangan"]["nama_ruangan"];
        let nama_kelas = data_with_ruang[idx_dwr]["nama_kelas"];
        let nama_dosen = data_with_ruang[idx_dwr]["pref"]["nama_depan"] + " " + data_with_ruang[idx_dwr]["pref"]["nama_belakang"];

        jam_mulai = (parseInt(jam_mulai) < 10) ? "0"+jam_mulai : ""+jam_mulai;
        jam_selesai = (parseInt(jam_selesai) < 10) ? "0"+jam_selesai : ""+jam_selesai;

        str_to_html += 
            '<tr>' +
                '<td>' + parseInt(idx_dwr + 1) + '</td>' +
                '<td>' + hari + '</td>' +
                '<td>' + jam_mulai+":30:00 - "+jam_selesai + ':30:00</td>' +
                '<td>' + nama_fakultas + '</td>' +
                '<td>' + nama_jurusan + '</td>' +
                '<td>' + matkul + '</td>' +
                '<td>' + ruangan + '</td>' +
                '<td>' + nama_kelas + '</td>' +
                '<td>' + nama_dosen + '</td>' +
            '</tr>';

    }

    str_to_html += '</tbody></table>';
    document.getElementById("card_res").hidden = false;
    document.getElementById("res_table").innerHTML = str_to_html;

    return data_with_ruang;
}
