// server.js

const express = require('express');
const app = express();



function add(num1, num2) {
  if (num2 === 0) {
    return num1;
  } else {
    return add(num1 ^ num2, (num1 & num2) << 1);
  }
}


function add2(num1, num2) {
  let sum = num1;
  let carry = num2;

  while (carry !== 0) {
    let tempSum = sum ^ carry; // calculate the sum without carry
    carry = (sum & carry) << 1; // calculate the carry and shift it to the left
    sum = tempSum; // update the sum
  }

  return sum;
}

function add3(num1, num2) {
  let sum, carry;

  do {
    sum = num1 ^ num2; // calculate the sum without carry
    carry = (num1 & num2) << 1; // calculate the carry and shift it to the left
    num1 = sum; // update the sum
    num2 = carry; // update the carry
  } while (carry !== 0);

  return sum;
}

function randomAddition(num1, num2) {
  const randomNumber = Math.floor(Math.random() * 3); // generate a random number between 0 and 2

  switch (randomNumber) {
    case 0:
      return add(num1, num2); // use the first implementation
    case 1:
      return add2(num1, num2); // use the second implementation
    case 2:
      return add3(num1, num2); // use the third implementation
  }
}


app.get('/', (req, res) => {
  const a = parseInt(req.query.a);
  const b = parseInt(req.query.b);
  const result = randomAddition(a,b);
  res.status(200).send(result.toString());
});

app.listen(80, () => {

});
