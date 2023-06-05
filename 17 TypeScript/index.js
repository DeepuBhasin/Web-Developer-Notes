function add(n1, n2) {
    if (typeof n1 !== 'number' || typeof n2 !== 'number') {
        throw new Error('Invalid Input');
    }
    return n1 + n2;
}

console.log(add(2, 3.5));
console.log(add('2', 3));