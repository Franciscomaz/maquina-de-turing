class ArrayAssociativo{
    constructor(){
        this.array = [];
    }

    add(key, value){
        this.array[key] = value;
    }

    value(key){
       return this.array[key];
    }

    size(){
        return Object.keys(this.array).length;
    }

    contains(key){
        return this.array[key] !== undefined;
    }
}