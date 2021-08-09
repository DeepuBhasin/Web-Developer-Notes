let fetchBtn = document.getElementById("fetchBtn");
fetchBtn.addEventListener("click", buttonClickHandler);
function buttonClickHandler() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "test.txt", true);
  xhr.onprogress = function () {
    console.log("On progress");
  };

  //   readyState	Holds the status of the XMLHttpRequest.
  // 0: request not initialized
  // 1: server connection established
  // 2: request received
  // 3: processing request
  // 4: request finished and response is ready
  xhr.onreadystatechange = function () {
    console.log("ready state is ", xhr.readyState);
  };

  //   status	200: "OK"
  // 403: "Forbidden"
  // 404: "Page not found"
  // For a complete list go to the Http Messages Reference
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(this.responseText);
    } else {
      console.log("File Not Found 404");
    }
  };
  xhr.send();
}
