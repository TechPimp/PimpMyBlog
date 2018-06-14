document.getElementsByClassName('link-menu top-left')[0].addEventListener('click', function() {
  const els = document.getElementsByClassName('editable');
  let contents = {};
  [].forEach.call(els, function (el) {
    contents[el.dataset.contentlabel] = el.innerText
  });

  fetch(location.pathname,
  {
      method: "POST",
      body: JSON.stringify(contents)
  })
  .then(function(res){ return res.json() })
  .then(function(data){
    console.log(data)
  })
})
