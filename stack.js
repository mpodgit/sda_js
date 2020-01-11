class Stack {
    constructor(...items) {
        this.reverse = false;
        this.stack = [...items];
    }

    push(...items) {
        return this.reverse
            ? this.stack.unshift(...items)
            : this.stack.push(...items);
    }

    pop() {
        return this.reverse ? this.stack.shift() : this.stack.pop();
    }
}

var stackTest = new Stack('1', '2', 'a');
stackTest.push(false, 'test', 'e');

console.log(stackTest.pop());
console.log(stackTest.pop());
console.log(stackTest.pop());
console.log(stackTest.pop());
console.log(stackTest.pop());
console.log(stackTest.pop());
