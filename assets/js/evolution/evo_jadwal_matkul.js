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

        } else {

            let list_option_prefs = filterChancePref(cari_matkul);

            if (list_option_prefs.length == 0) {
                data_class_requirement[idx]["pref"] = false;
            } else {

                let random_idx = list_option_prefs[Math.floor(Math.random() * list_option_prefs.length)];

                let random_pref = group_pref_per_matkul[cari_matkul][random_idx];
                random_pref = takeOneTime(random_pref);

                data_preferensi_dosen[parseInt(random_pref["no"])] = random_pref;
                data_class_requirement[idx]["pref"] = parseInt(random_pref["no"]);

            }

            new_indv.push(data_class_requirement[idx]["pref"]);

        }
    }
    return new_indv;
};


//Fungsi untuk Mencari Nilai Fitness 
function getFitness(indv) {
    let unique = indv.filter((item, i, ar) => ar.indexOf(item) === i);
    let err = indv.filter(element => element === false).length;

    // let sum_count = 0;
    // for (let idx_unique = 0; idx_unique < unique.length; idx_unique++) {
    //     sum_count++;
    // }

    return calculateErrorFitness([err, unique]);
}

function calculateErrorFitness(score) {
    return 1.0 / (1.0 + (sum_arr(score)));
}

function sum_arr(arrays) {
    let total_sum = 0;
    for (let arr_idx = 0; arr_idx < arrays.length; arr_idx++) {
        for (let el_idx = 0; el_idx < arrays[arr_idx].length; el_idx++) {
            total_sum += arrays[arr_idx][el_idx];
        }

    }
    return total_sum;
}

function parseShiftData(schedule) {
    var shift = [];
    var data_shift = [];
    for (var x = 0; x < 13; x++) {
        shift.push("shift" + (x + 1));
    }

    for (var x = 0; x < shift.length; x++) {
        data_shift.push(schedule[shift[x]]);
    }
    return data_shift;
}

//Fungsi untuk Menambah suatu index ke array problem
// function addProb(index) {
//     if (!problem.includes(index)) {
//         problem.push(index);
//     }
// }

// //Fungsi untuk Menambah suatu index ke array dosen yg tidak ada jadwal dalam suatu shift
// function addProbLess(index) {
//     if (!probLess.includes(index)) {
//         probLess.push(index);
//     }
// }

//Fungsi untuk Melakukan Proses Mutasi
function mutate(indv) {

    let err = indv.filter(element => element === false);



    // for (let idx = 0; idx < err.length; idx++) {
    //     // let selectProblem = Math.floor(Math.random() * problem.length);
    //     let matkul = parseInt(data_preferensi_dosen[parseInt(err[idx]["no"])]['id_matkul']);
    //     let selectPref = Math.floor(Math.random() * group_pref_per_matkul[matkul].length);

    //     indv[err[idx]] = parseInt(group_pref_per_matkul[matkul][selectPref]['no']);
    // }



    // let shiftSelection = Math.floor(Math.random() * 4);

    // let selectProbLess = Math.floor(Math.random() * probLess.length);
    // let shiftSelectLess = Math.floor(Math.random() * 4);

    // let mutatedIndex = problem[selectProblem] + shiftSelection;
    // let mutatedIndexLess = probLess[selectProbLess] + shiftSelectLess;

    // indv[mutatedIndex] = 0;
    // indv[mutatedIndexLess] = 1;
    let new_indv = [];

    for (let idx = 0; idx < data_preferensi_dosen.length; idx++) {
        // if (!unique_sks.includes(parseInt(data_preferensi_dosen[idx].sks))){
        //     unique_sks.push(parseInt(data_preferensi_dosen[idx].sks));
        // }

        data_preferensi_dosen[idx]['possible_sks'] = setPossibleSks(data_preferensi_dosen[idx]);
        data_preferensi_dosen[idx]['shift_selected'] = shift_zeros();
        // if (group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] == undefined) {
        //     group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] = [];
        // }
        // group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']].push(data_preferensi_dosen[idx]);
    }

    for (let idx = 0; idx < data_class_requirement.length; idx++) {
        let cari_matkul = data_class_requirement[idx]["id_matkul"];

        // console.log("group_pref_per_matkul[cari_matkul]",group_pref_per_matkul[cari_matkul]);
        if (group_pref_per_matkul[cari_matkul] == undefined) {
            uncomplete_data_matkul.push(cari_matkul);
            data_class_requirement[idx]["pref"] = false;
            // new_indv.push(0);
        } else {

            let list_option_prefs = filterChancePref(cari_matkul);
            // console.log("list_option_prefs", idx, list_option_prefs)
            if (list_option_prefs.length == 0) {
                data_class_requirement[idx]["pref"] = false;
            } else {
                // let random_pref =  group_pref_per_matkul[cari_matkul][Math.floor(Math.random() *
                // group_pref_per_matkul[cari_matkul].length)];
                // let random_pref =  group_pref_per_matkul[cari_matkul][Math.floor(Math.random() *
                // group_pref_per_matkul[cari_matkul].length)];
                let random_idx = list_option_prefs[Math.floor(Math.random() * list_option_prefs.length)];

                let random_pref = group_pref_per_matkul[cari_matkul][random_idx];
                random_pref = takeOneTime(random_pref);
                // console.log("terpilih", parseInt(random_pref["no"]));
                // console.log("pref_updated", random_pref);
                data_preferensi_dosen[parseInt(random_pref["no"])] = random_pref;
                data_class_requirement[idx]["pref"] = parseInt(random_pref["no"]);

            }

            // if (checkAvaibleSKS(random_pref["no"], 1, random_pref["sks"])){

            // }

            new_indv.push(data_class_requirement[idx]["pref"]);
            //    
            // data_scheduled_class.push(data_class_requirement[idx]);
        }
    }

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
    console.log("result", results);
    generateResult();

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
    return pref;
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
    let class_preffed = data_class_requirement.filter(element => element['pref'] != undefined);
    // let scheduled_rooms = [];
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

        class_preffed[class_idx]["pref"] = takeOneShiftRoom(class_preffed[class_idx]["pref"]);

        let ruangan_selection = group_ruangan[class_preffed[class_idx]["id_jurusan"]];
        ruangan_selection = ruangan_selection.filter(element => !element["scheduled"].includes([class_preffed[class_idx]["pref"]["id_hari"], class_preffed[class_idx]["pref"]["id_hari"]]));

        let random_ruangan = ruangan_selection[Math.floor(Math.random() * ruangan_selection.length)];
        // let random_ruangan = ruangan_selection[random_idx];
        class_preffed[class_idx]["ruangan"] = random_ruangan;

        let update_ruang_scheduled = data_ruangan.filter(element => element["id_ruangan"] == random_ruangan["id_ruangan"]);
        for (let urs_idx = 0; urs_idx < update_ruang_scheduled.length; urs_idx++) {
            data_ruangan[update_ruang_scheduled[urs_idx]["no"]]["scheduled"].push([class_preffed[class_idx]["pref"]["id_hari"], class_preffed[class_idx]["pref"]["room_shift"]]);
        }

        // scheduled_rooms.push([class_preffed[class_idx]["id_hari"], class_preffed[class_idx]["pref"]["room_shift"]]);
    }
    return class_preffed;
}

// //Fungsi untuk proses persilangan/perkawinan
// function breedFunction(parent0, parent1) {
//     let protoParent = Math.round(Math.random());
//     let newborn = protoParent == 0 ? parent0.slice() : parent1.slice();

//     for (var i = 0; i < 2; i++) {

//         let probPoint = Math.floor(Math.random() * problem.length);
//         let probLessPoint = Math.floor(Math.random() * probLess.length);

//         let breedPoint = problem[probPoint] + Math.floor(Math.random() * 4);
//         let breedPoint2 = probLess[probLessPoint] + Math.floor(Math.random() * 4);

//         let tmp = newborn[breedPoint];
//         newborn[breedPoint] = newborn[breedPoint2];
//         newborn[breedPoint2] = tmp;

//     }
//     return newborn;
// };

// function getPrefById(id_preferensi){
//     for (let idx = 0; idx < data_preferensi_dosen.length; idx++) {
//         const element = array[idx];

//     }
//     data_preferensi_dosen
// }

// function get_shift_pref(idx_pref, last_shift){
//     res = null;
//     for (var x = last_shift+1 ; x < 13; x++) {

//         var shift = data_preferensi_dosen[idx_pref]["shift" + (x + 1)]
//         if(shift == "1"){
//             return x;
//         }
//     }
//     return res;
// }


function generateResult(selected_pop = 0) {

    for (let idx = 0; idx < data_class_requirement.length; idx++) {
        // if (data_class_requirement[idx][]) {

        // }
        data_class_requirement[idx]["pref"] = data_preferensi_dosen[results.population[selected_pop]["individual"][idx]];



    }
    // results.population.length

    console.log("uncomplete_data_matkul", uncomplete_data_matkul);
    console.log("data_class_requirement", data_class_requirement);
    console.log("group_pref_per_matkul", group_pref_per_matkul);

    let data_with_ruang = setRuangan();
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
                '<th scope="col">RUANG</th>' +
                '<th scope="col">KELAS</th>' +
                '<th scope="col">DOSEN</th>' +
            '</tr>' +
        '</thead>' +
        '<tbody>';

    for (let idx_dwr = 0; idx_dwr < data_with_ruang.length; idx_dwr++) {
        let hari = hari_list[parseInt(data_with_ruang[idx_dwr]['pref']['id_hari']) - 1];
        let jam_mulai = parseInt(data_with_ruang[idx_dwr]["pref"]["room_shift"]) + 6;
        let jam_selesai = jam_mulai + parseInt(data_with_ruang[idx_dwr]["sks"]);
        let nama_fakultas = data_with_ruang[idx_dwr]["ruangan"]["nama_fakultas"];
        let nama_jurusan = data_with_ruang[idx_dwr]["nama_jurusan"];
        let ruangan = data_with_ruang[idx_dwr]["ruangan"]["nama_ruangan"];
        let nama_kelas = data_with_ruang[idx_dwr]["nama_kelas"];
        let nama_dosen = data_with_ruang[idx_dwr]["pref"]["nama_depan"] + " " + data_with_ruang[idx_dwr]["pref"]["nama_belakang"];

        let jam_lengkap = jam_mulai < 10 == 1 ? "0"+jam_mulai : jam_mulai;

            jam_lengkap += jam_lengkap + (jam_selesai < 10 ) ? "0"+jam_selesai : jam_selesai;

        str_to_html += 
            '<tr>' +
                '<td>' + parseInt(idx_dwr + 1) + '</td>' +
                '<td>' + hari + '</td>' +
                '<td>' + jam_mulai+":30:00 - "+jam_selesai + ':30:00</td>' +
                '<td>' + nama_fakultas + '</td>' +
                '<td>' + nama_jurusan + '</td>' +
                '<td>' + ruangan + '</td>' +
                '<td>' + nama_kelas + '</td>' +
                '<td>' + nama_dosen + '</td>' +
            '</tr>';

    }
    str_to_html += '</tbody></table>';

    document.getElementById("res_table").innerHTML = str_to_html;

}
