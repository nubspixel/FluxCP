// var $dOut = $('#t-date'),
//     $hOut = $('#server-time #t-hours'),
//     $mOut = $('#server-time #t-minutes'),
//     $sOut = $('#server-time #t-seconds');
//     // $ampmOut = $('#t-ampm');
var months = [
  'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];

var days = [
  'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
];

function t_update(){
  var date = new Date();
  // set UTC time zone (UTC+8)
  date.setTime(date.getTime() + date.getTimezoneOffset() * 60 * 1000 + (/* UTC+8 */ 8) * 60 * 60 * 1000);

  // var ampm = date.getHours() < 12
  //            ? 'AM'
  //            : 'PM';

  // var hours = date.getHours() == 0
  //             ? 12
  //             : date.getHours() > 12
  //               ? date.getHours() - 12
  //               : date.getHours();

  var hours = date.getHours() < 10
                ? '0' + date.getHours()
                : date.getHours();

  var minutes = date.getMinutes() < 10
                ? '0' + date.getMinutes()
                : date.getMinutes();

  var seconds = date.getSeconds() < 10
                ? '0' + date.getSeconds()
                : date.getSeconds();

  var dayOfWeek = days[date.getDay()];
  var month = months[date.getMonth()];
  var day = date.getDate();
  var year = date.getFullYear();

  var dateString = dayOfWeek + ', ' + month + ' ' + day + ', ' + year;

  // console.log(dateString);
  // $dOut.text(dateString);
  $('#server-time #t-hours').text(hours);
  $('#server-time #t-minutes').text(minutes);
  $('#server-time #t-seconds').text(seconds);
  // $ampmOut.text(ampm);
}

$(function() {
  t_update();
  window.setInterval(t_update, 1000);
});