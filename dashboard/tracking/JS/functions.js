var TRACKER_USERS = "trackerUsers";

//Check if Dropdown is Empty
function checkNoUserSelected(){
var dropDownList = document.getElementById('userDropDown');
  if (dropDownList.value == ''){
  return true;
  }
}

//Sort Entries by date
function sortArrayByDate(entries){
  for (var i = 0; i < entries.length;i++){
      entries[i]['data'].sort(function(a,b){
        return new Date(a['date']) - new Date(b['date'] );
      });
  }
}

//Load the users that are in local storage and add them to the drop down list
function loadUsers(){
var dropDownList = document.getElementById('userDropDown');
while (dropDownList.hasChildNodes()) {
  dropDownList.removeChild(dropDownList.firstChild);
}
var usersList = JSON.parse(localStorage.getItem(TRACKER_USERS));
if (usersList != null){
  for (var i = 0; i < usersList.length; i++){
    var newOption = document.createElement("option");
        newOption.text = usersList[i].name;
        newOption.value = usersList[i].name;
        dropDownList.appendChild(newOption)
  }
  loadEntries();
}

}


//charting function with chart.js
function drawChart(){

  var chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(231,233,237)'
  };

var name = document.getElementById('userDropDown').value;
var chart = document.getElementById('chart');
var dataEntries = JSON.parse(localStorage.getItem(TRACKER_USERS));
var index= dataEntries.findIndex(obj => obj.name == name);
var dateEntries = [];
var weightEntries = [];

for (var i = 0; i < dataEntries[index]['data'].length; i++){
  dateEntries.push(dataEntries[index]['data'][i].date);
  weightEntries.push(dataEntries[index]['data'][i].weight);
}

let lineChart = new Chart(chart, {
  type: 'line',
  data:{
    labels: dateEntries,
    datasets:[
      {
        backgroundColor: chartColors.red,
        borderColor: chartColors.red,
        label: name,
        fill: false,
        data: weightEntries
    }
  ]
  }
}
)

}

//delete a user from the storage
function deleteUser(){
  var dropDownList = document.getElementById('userDropDown');
  var userToDelete = dropDownList.value;
  var entries = JSON.parse(localStorage.getItem(TRACKER_USERS));
  var index= entries.findIndex(obj => obj.name == userToDelete);
  entries.splice(index,1);
  sortArrayByDate(entries);
  localStorage.setItem(TRACKER_USERS, JSON.stringify(entries));
  loadUsers();
  if (checkNoUserSelected()){
    var table = document.getElementById('entryTable');
    var chart = document.getElementById('chart');
    chart.style.display = 'none';
    table.innerHTML ='';
  }

}


//Save an entry for the user
//If the user does not exist yet, add the user to storage and then add the entry
function saveEntry(){
  var name = document.getElementById('name').value;
  var tempSelectedUser = document.getElementById('userDropDown').value;
  var weight = document.getElementById('weight').value;
  var date = document.getElementById('date').value;
  var breakfast = document.getElementById('breakfastInput').value.replace(/\r?\n/g, '<br />');
  var lunch = document.getElementById('lunchInput').value.replace(/\r?\n/g, '<br />');
  var dinner = document.getElementById('dinnerInput').value.replace(/\r?\n/g, '<br />');
  var exercise = document.getElementById('exerciseInput').value.replace(/\r?\n/g, '<br />');
  var issueId = chance.guid();
  var existsFlag = false;

  if(name == '' || name == null || weight == '' || weight == null || date == '' || date == null || breakfast == '' || breakfast == null || lunch == '' || lunch == null || dinner == '' || dinner == null || exercise == '' || exercise == null){
    alert('Please fill  in all fields');
  }else{
  var newEntry = {
    name:name,
    "data":[{
      id: issueId,
      weight: weight,
      date: date,
      breakfast: breakfast,
      lunch: lunch,
      dinner: dinner,
      exercise: exercise

    }]
  };

 var rawData = {
   weight: weight,
   date: date,
   id: issueId,
   breakfast: breakfast,
   lunch: lunch,
   dinner: dinner,
   exercise: exercise
 }

  if (localStorage.getItem(TRACKER_USERS) == null){
    var entries = [];
    entries.push(newEntry);
    var existsFlag = false;
    localStorage.setItem(TRACKER_USERS, JSON.stringify(entries));
  } else {
    var existingEntries = JSON.parse(localStorage.getItem(TRACKER_USERS));
    for (var i = 0;i < existingEntries.length; i++){
        if (name == existingEntries[i].name){
          existingEntries[i]["data"].push(rawData);
          existsFlag = true;
        }
    }
  if (existsFlag == false){
    existingEntries.push(newEntry);
  }
    sortArrayByDate(existingEntries);
    localStorage.setItem(TRACKER_USERS, JSON.stringify(existingEntries));
  }
loadUsers();
if (tempSelectedUser != null, tempSelectedUser != ''){
document.getElementById('userDropDown').value = tempSelectedUser
loadEntries();
}
}
}


//Load the entries for the selected user
function loadEntries(){
  var table = document.getElementById('entryTable');
  var chart = document.getElementById('chart');
  var entries = [];
  var name = document.getElementById('userDropDown').value;
  entries = JSON.parse(localStorage.getItem(TRACKER_USERS));
  var index = entries.findIndex(obj => obj.name == name);
  if (entries.length > 0){
    if (entries[index]['data'].length > 0){
  table.innerHTML = '<thead>'+
    '<th>Name</th>'+
    '<th>Weight</th>'+
    '<th>Date</th>'+
    '<th>Functions</th>' +
     '</thead>';


  for (var i = 0; i < entries[index]["data"].length; i ++){
      var newRow = table.insertRow(table.length),
      cell1 = newRow.insertCell(0),
      cell2 = newRow.insertCell(1),
      cell3 = newRow.insertCell(2);
      cell4 = newRow.insertCell(3);
      cell1.innerHTML = name;
      cell2.innerHTML = entries[index]['data'][i].weight;
      cell3.innerHTML = entries[index]['data'][i].date;
      cell4.innerHTML = '<input type = "button" onclick="deleteEntry(\''+ entries[index]['data'][i].id +'\')" class="btn btn-danger" value = "Delete">'+
                        '<input type = "button" onclick="displayDetails(\''+ entries[index]['data'][i].id +'\')" class="btn btn-primary buttonMargin" value = "Details" data-toggle="modal" data-target="#detailsModal">' +
                        '<input type = "button" onclick="displayEditModal(\''+ entries[index]['data'][i].id +'\')" class="btn btn-warning buttonMargin" value = "Edit" data-toggle="modal" data-target="#editModal">';


}

chart.style.display = 'block';
drawChart();
}
else {
  chart.style.display = 'none';
  table.innerHTML ='';
}
}
}


//Delete a selected entry
function deleteEntry(id){

  var entries = JSON.parse(localStorage.getItem(TRACKER_USERS));
  for (var i = 0; i < entries.length; i++){
    for (var j = 0; j < entries[i]["data"].length; j++){
  if (id == entries[i]["data"][j].id)  {
  entries[i]["data"].splice(j,1);
  }
}
}
  sortArrayByDate(entries);
  localStorage.setItem(TRACKER_USERS, JSON.stringify(entries));
  loadEntries();
}

function getCurrentDate(){
  var dateField = document.getElementById('date');
  dateField.value = moment().format("YYYY-MM-DD");
}

//display the details that the user entered (meanls, exercise)
function displayDetails(id){

  var entries = JSON.parse(localStorage.getItem(TRACKER_USERS));
  var modalBody = document.getElementById('detailsModalBody');
  var selectedEntry = ''
  for (var i = 0; i < entries.length; i++){
    for (var j = 0; j < entries[i]["data"].length; j++){
  if (id == entries[i]["data"][j].id)  {
    selectedEntry = entries[i]["data"][j];
  }

modalBody.innerHTML = "<h5>Breakfast</h5><p>" + selectedEntry['breakfast'] + "</p>"
                      + "<h5>Lunch</h5><p>" + selectedEntry['lunch'] + "</p>"
                      + "<h5>Dinner</h5><p>" + selectedEntry['dinner'] + "</p>"
                      + "<h5>Exercise Routine</h5><p>" + selectedEntry['exercise'] + "</p>";
  }
}
}

var tempID = '';
function displayEditModal(id){

  var entries = JSON.parse(localStorage.getItem(TRACKER_USERS));
  var modalBody = document.getElementById('editModalBody');
  var selectedEntry = '';
  var nameEdit ='';
  for (var i = 0; i < entries.length; i++){
    for (var j = 0; j < entries[i]["data"].length; j++){
  if (id == entries[i]["data"][j].id)  {
    selectedEntry = entries[i]["data"][j];
    nameEdit = entries[i]['name'];
  }
}
}
  document.getElementById('nameEdit').value = nameEdit;
  document.getElementById('weightEdit').value = selectedEntry['weight'];
  document.getElementById('dateEdit').value = selectedEntry['date'];
  document.getElementById('breakfastInputEdit').value = selectedEntry['breakfast'].replace( /<br\s*[\/]?>/gi, "\n");
  document.getElementById('lunchInputEdit').value = selectedEntry['lunch'].replace(/<br\s*[\/]?>/gi, "\n");
  document.getElementById('dinnerInputEdit').value = selectedEntry['dinner'].replace(/<br\s*[\/]?>/gi, "\n");
  document.getElementById('exerciseInputEdit').value = selectedEntry['exercise'].replace(/<br\s*[\/]?>/gi, "\n");
  tempID = id;

}

//For saving the edit modal
function saveEditedEntry(id){

  var entries = JSON.parse(localStorage.getItem(TRACKER_USERS));
  for (var i = 0; i < entries.length; i++){
    for (var j = 0; j < entries[i]["data"].length; j++){
  if (id == entries[i]["data"][j].id)  {
    entries[i]['name'] = document.getElementById('nameEdit').value
    entries[i]['data'][j]['weight'] = document.getElementById('weightEdit').value;
    entries[i]['data'][j]['date'] = document.getElementById('dateEdit').value;
    entries[i]['data'][j]['breakfast'] = document.getElementById('breakfastInputEdit').value.replace(/\r?\n/g, '<br />');
    entries[i]['data'][j]['lunch'] = document.getElementById('lunchInputEdit').value.replace(/\r?\n/g, '<br />');
    entries[i]['data'][j]['dinner'] = document.getElementById('dinnerInputEdit').value.replace(/\r?\n/g, '<br />');
    entries[i]['data'][j]['exercise'] = document.getElementById('exerciseInputEdit').value.replace(/\r?\n/g, '<br />');
  }
}
}

 sortArrayByDate(entries);
 localStorage.setItem(TRACKER_USERS, JSON.stringify(entries));
 $('#modalSaveText').fadeIn(50).fadeOut(2000);
 loadUsers();
 loadEntries();
}

//jquery animations
$('#outer-container').fadeIn(2000);
$('#addEntryForm').delay(1000).animate({
  opacity:'1'
}, 2000);

//event handlers
var saveChangesButton = document.getElementById('saveChangesButton');
saveChangesButton.addEventListener("click", function () { saveEditedEntry(tempID)});
var todayButton = document.getElementById('todayButton');
todayButton.addEventListener("click", getCurrentDate);
var deleteUserButton = document.getElementById('deleteUserButton');
deleteUserButton.addEventListener("click", deleteUser);
var addEntriesButton = document.getElementById('addEntryButton');
addEntriesButton.addEventListener("click", saveEntry);
var loadEntriesButton = document.getElementById('loadEntriesButton');
loadEntriesButton.addEventListener("click", loadEntries);
var selectList = document.getElementById('userDropDown');
selectList.addEventListener("change", loadEntries);
