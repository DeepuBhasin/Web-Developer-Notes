const express = require("express");
const app = express();
const morgan = require("morgan");
const port = 80;

const courseRouter = require("./routes/course");

app.use(express.json());
app.use(morgan("dev"));

app.use("/api/v1/course", courseRouter);

app.get("/", (req, res) => {
  return res.status(200).send("Express server is running");
});

app.get("*", (req, res) => {
  return res.status(404).send("Page not found");
});

app.listen(port, () => console.log(`Server is running on port ${port}`));
