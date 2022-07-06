var editBtn = document.getElementById('editBtn');
var editables = document.querySelectorAll('#available, #from, #until');

if (typeof(Storage) !== "undefined") {
  if (localStorage.getItem('available') !== null) {
    editables[0].innerHTML = localStorage.getItem('available');
  }
  if (localStorage.getItem('from') !== null) {
    editables[1].innerHTML = localStorage.getItem('from');
  }
  if (localStorage.getItem('until') !== null) {
    editables[2].innerHTML = localStorage.getItem('until');
  }
}

editBtn.addEventListener('click', function(e) {
  if (!editables[0].isContentEditable) {
    editables[0].contentEditable = 'true';
    editables[1].contentEditable = 'true';
    editables[2].contentEditable = 'true';
    editBtn.innerHTML = 'Save Changes';
    editBtn.style.backgroundColor = '#6F9';
  } else {
    // Disable Editing
    editables[0].contentEditable = 'false';
    editables[1].contentEditable = 'false';
    editables[2].contentEditable = 'false';
    // Change Button Text and Color
    editBtn.innerHTML = 'Enable Editing';
    editBtn.style.backgroundColor = '#F96';
    // Save the data in localStorage
    for (var i = 0; i < editables.length; i++) {
      localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);
    }
  }
});

setInterval(function() {
  for (var i = 0; i < editables.length; i++) {
    localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);
  }
}, 5000);
