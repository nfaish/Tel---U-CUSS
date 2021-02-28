function Toolbox() {
    this.genIndv = function() {};
    this.getFitness = function() {};
    this.mutate = function() {};
    this.goalFitness = Toolbox.fitnessMax;
};

Toolbox.fitnessMax = 1;
Toolbox.fitnessMin = -1;

function EvolutionarryAlgorithm(toolbox, popSize, mutProb, breedFunction, verbose = false) {

    checkConstructorVars(toolbox, popSize, mutProb, breedFunction);

    function checkConstructorVars(toolbox, popsize, mutProb, breedFunction) {
        if(toolbox === undefined) {
            throw 'Toolbox Harus Terdefinisikan';
        }

        if(popSize === undefined) {
            throw 'Ukuran Populasi Harus Terdefinisikan';
        }

        if (popSize <= 0) {
            throw 'Ukuran Populasi Harus > dari 1 Current size: ' + popSize;
        }

        if(mutProb === undefined) {
            throw 'Probabilitas Mutasi Harus Terdefinisikan';
        }

        if(breedFunction === undefined) {
            throw 'Fungsi Perkawinan Harus Terdefinisikan';
        }
    };

    

    this.evolve = function(generations) {
        let population = this.generatePopulation(toolbox.genIndv, popSize);

        for (var i = 0; i < generations; i++) {
            problem = [];
            probLess = [];
            population = this.getFitness(population, toolbox.getFitness);
            population = this.sortByFitness(population, toolbox.getFitness, toolbox.goalFitness);

            if (verbose) printUpdate(population, i);
            population = breed(population, toolbox.mutate, mutProb, breedFunction);
        }
        population = this.getFitness(population, toolbox.getFitness);
        population = this.sortByFitness(population, toolbox.getFitness, toolbox.goalFitness);
        if (verbose) printUpdate(population, generations);

        let results = getResults(population, toolbox.getFitness, generations);
        return results;
    };


    // Generate a population with the given individual 
    // generation strategy and population size
    this.generatePopulation = function(genIndv, popSize) {
        let pop = [];
        for (var i = 0; i < popSize; i++) {
            let indv = { individual: genIndv() }
            pop.push(indv);
        }
        return pop;
    };

    this.getFitness = function(population, getFitness) {
        for (var i = 0; i < population.length; i++){
            let indv = population[i];
            indv.fitness = getFitness(indv.individual);
            population[i] = indv;
        }
        return population;
    }

    // Untuk mensorting array dari populasi
    this.sortByFitness = function(population, getFitness, goalFitness) {
        population.sort(function(a, b) {
            return (b.fitness - a.fitness) * goalFitness;
        });
        return population;
    };

    // breed population and apply mutation if probability met
    function breed(population, mutate, mutProb, breedFunction) {

        // Pilih Individu Terbaik dan Eliminasi 50% sisanya
        let breeders = Math.round(population.length / 2);
        let newPopulation = population.slice(0, breeders);

        // Select parents
        while (newPopulation.length != population.length) {
            let parentAIndex = Math.floor(Math.random() * breeders);
            let parentBIndex = Math.floor(Math.random() * breeders);

            while (parentAIndex == parentBIndex) {
                parentBIndex = Math.floor(Math.random() * breeders);
            }

            let parentA = population[parentAIndex].individual;
            let parentB = population[parentBIndex].individual;

            // Membuat Keturunan
            let newborn = breedFunction(parentA, parentB);

            // Mutasi Hasil Keturunan
            if (Math.random() <= mutProb) {
                newborn = mutate(newborn);
            }
            newPopulation.push({ individual: newborn });
        }
        return newPopulation;
    };

    function getResults(population, getFitness, generations) {
        let results = {
            generations: generations,
            population: []
        };
        for (var i = 0; i < population.length; i++) {
            let indv = population[i];
            results.population.push(indv);
        }
        return results;
    };

    function printUpdate(population, generation) {
        let fittestScore = population[0].fitness;
        let sum = 0;
        for (var i = 0; i < population.length; i++) {
            sum += population[i].fitness;
        }
        let average = sum / population.length;
        console.log("Generation:", generation, "Fittest:", fittestScore, "Average:", average);
        console.log("population", population);
    };
};

function Algorithms() {};

Algorithms.crossBreed = function(parentA, parentB) {
    // Select cutOff point and create newborn
    let cutOff = Math.floor(Math.random() * parentA.length);
    let newborn = parentA.slice(0, cutOff + 1);
    let parentBChrom = parentB.slice(cutOff + 1, parentB.length);

    for (var i = 0; i < parentBChrom.length; i++) {
        newborn.push(parentBChrom[i]);
    }
    return newborn;
}