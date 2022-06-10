const options = {
    method: 'GET',
    headers: {
        'X-RapidAPI-Host': 'find-any-ip-address-or-domain-location-world-wide.p.rapidapi.com',
        'X-RapidAPI-Key': '29f6302340msha098499d27e7e65p13ea44jsn9c2fe5454a58'
    }
};

var lan
var lon
var temp

fetch('https://find-any-ip-address-or-domain-location-world-wide.p.rapidapi.com/iplocation?apikey=873dbe322aea47f89dcf729dcc8f60e8', options)
.then(function (response) {
    return response.json();
})
.then(function (data) {
    console.log(data);
    lon = data.longitude;
    console.log("lon -> " + lon)
    lan = data.latitude;
})

setTimeout(() => {

const opt = {
method: 'GET',
headers: {
    'X-RapidAPI-Host': 'weatherbit-v1-mashape.p.rapidapi.com',
    'X-RapidAPI-Key': '29f6302340msha098499d27e7e65p13ea44jsn9c2fe5454a58'
}
};

console.log(lan)
console.log(lon)

fetch('https://weatherbit-v1-mashape.p.rapidapi.com/current?lon=' + lon +'&lat=' + lan, opt)
.then(function (response) {
    return response.json();
})
.then(function (data) {
    console.log(data);
    temp = data.data[0].app_temp;
    console.log(temp)
    tempo = data.data[0].weather.description
    console.log(tempo)
    document.getElementById("ttt").innerText += " " + temp;
    document.getElementById("aaa").innerText += " " + tempo;
})


}, 1500);