const express = require("express");
const courseRouter = express.Router();
const courseMiddleware = require("../middlewares/course");

courseRouter
  .get("/", courseMiddleware.getRequestMiddleware)
  .get("/:id", courseMiddleware.getSingleRequestMiddleware)
  .post(
    "/",
    courseMiddleware.validateCourseName,
    courseMiddleware.postRequestMiddleware
  )
  .put(
    "/:id",
    courseMiddleware.findCourseMiddleware,
    courseMiddleware.patchRequestMiddleware
  )
  .delete(
    "/:id",
    courseMiddleware.findCourseMiddleware,
    courseMiddleware.deleteRequestMiddleware
  );

module.exports = courseRouter;
