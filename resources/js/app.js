import "./bootstrap";
console.log(window.Echo);
window.Echo.channel("jobs-status").listen("JobStatus", (e) => {
    console.log(e);
});
