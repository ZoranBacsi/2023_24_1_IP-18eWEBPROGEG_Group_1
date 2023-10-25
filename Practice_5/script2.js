const canvas = document.querySelector("canvas")
const ctx = canvas.getContext("2d")
let spiderturtleImage = new Image();
spiderturtleImage.src = "spiderTurtleImage.png";

let spiderturtle = {
    x: canvas.width / 2,
    y: canvas.height / 2,
    epsilon: 0
}

function mozgas(ds) {
    ctx.beginPath()
    ctx.moveTo(spiderturtle.x, spiderturtle.y)
    spiderturtle.x += Math.sin(spiderturtle.epsilon * Math.PI / 180) * ds
    spiderturtle.y -= Math.cos(spiderturtle.epsilon * Math.PI / 180) * ds
    ctx.lineTo(spiderturtle.x,spiderturtle.y)
    ctx.stroke()
    ctx.drawImage(spiderturtleImage,spiderturtle.x-25,spiderturtle.y-25)
}

function forgas(de) {
    spiderturtle.epsilon += de
}

function sokszog(n, a) {
    for (let i = 0; i < n; i++) {
        mozgas(a)
        forgas(360/n)
    }
}

ctx.lineWidth = 2;
sokszog(8,70)
