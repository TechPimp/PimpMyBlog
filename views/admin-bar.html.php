<div class="content-circle-menu" id="admin-menu">
  <div class="circle-menu">
    <a href="#" class="link-menu top-left">
      <img class="img-link-menu" src="../assets/images/download-button.png" alt="">
    </a>
    <div class="link-menu top-right" id='admin-menu-header'></div>
    <a href="#" class="link-menu bottom-left">
      <img class="img-link-menu" src="../assets/images/rubbish-bin.png" alt="">
    </a>
    <a href="/new_article" class="link-menu">
      <img class="img-link-menu" src="../assets/images/add.png" alt="">
    </a>
  </div>
  <div class="circle-center">
  </div>
</div>

<script type="text/javascript">
dragElement(document.getElementById(("admin-menu")));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
