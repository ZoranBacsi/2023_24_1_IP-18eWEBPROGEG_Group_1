const inputCity      = document.querySelector("#city")
const findButton     = document.querySelector("#find")
const inputLat       = document.querySelector("#lat")
const inputLon       = document.querySelector("#lon")
const weatherButton  = document.querySelector("#weather")
const outputSpan     = document.querySelector("span")
const table          = document.querySelector("table")

const key = "" // IDE KELL AZ API KULCS

function handleFindButtonClick(){
    let xhr = XMLHttpRequest()
    xhr.addEventListener("load", onLoad)
    xhr.open("GET", `https://nominatim.openstreetmap.org/search?city=${inputCity.value}&format=json`)
    xhr.responseType = "json"
    xhr.send(null)
}

function onLoad(){
    if(this.response.length > 0){
        inputLat.value = this.response[0].lat
        inputLon.value = this.response[0].lon
    }else{
        inputLat.value = ""
        inputLon.value = ""
    }
}

findButton.addEventListener("click", handleFindButtonClick)
weatherButton.addEventListener("click", handleWeatherButtonClick)

async function handleWeatherButtonClick() {
    let response = await fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${inputLat.valueAsNumber}&lon=${inputLon.valueAsNumber}&appid=${KEY}`)
    let data = await response.json()

    console.log(data)
    outputSpan.innerHTML = `Hőmérséklet: ${(data.current.temp - 273.15).toFixed(2)} °C <br>Légnyomás: ${data.current.pressure} mbar`
    data.hourly.slice(0, 10).forEach(function(h){
        let tr = document.createElement("tr")
        let td1 = document.createElement("td")
        let date = new Date(h.dt * 1000)
        td1.innerText = date.getHours() + " óra"
        tr.appendChild(td1)
        let td2 = document.createElement("td")
        td2.innerText = (h.temp - 273.15).toFixed(2) + " °C"
        tr.appendChild(td2)
        table.appendChild(tr)
    })
}