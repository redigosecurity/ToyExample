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

app.get('/', (req, res) => {
  const a = parseInt(req.query.a);
  const b = parseInt(req.query.b);
  const result = add(a,b);
  res.status(200).send(result.toString());
});

app.listen(80, () => {

});
