function burgerMenu() {
    let nav = document.getElementById("menu");
    nav.classList.toggle("toggle");
    document.getElementById("header-burger").classList.toggle("toggle");
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    document.body.classList.toggle("toggle");
}



var url = new URL(window.location.href);
var color = url.searchParams.get("color");
var msg = url.searchParams.get("msg");
var newDiv = document.createElement("div");
newDiv.classList.add("error");
if (color != null) {
    newDiv.style.background = color;
    console.log("test");

}
console.log("test");

if (msg != null) {
    console.log("test");

    newDiv.style.content = msg;
    var newContent = document.createTextNode(msg);
    newDiv.appendChild(newContent);
}

document.body.insertBefore(newDiv, document.getElementsByTagName("div")[0]);



setTimeout(function() {
    document.getElementsByClassName("error")[0].classList.add("hide");
}, 10000)


// <?php
// if (isset($_GET['msg'])) {
//     $error = urldecode($_GET['msg']);
//     if (strlen($error) > 1) {
//             ?>
//     <div style="background: <?php if (isset($_GET['color'])) {
//         echo $_GET['color'];
//     } ?>" class="error" id="hideDiv">
//     <?php echo(htmlspecialchars($error)); ?>
// </div>
//     <?php
// }
// }
//     ?>