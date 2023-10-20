const canvas = document.querySelector("canvas")
const ctx = canvas.getContext("2d")

// háromszög
ctx.fillStyle = "blue"
ctx.strokeStyle = "orange"
ctx.lineWidth = 5
ctx.beginPath()
ctx.moveTo(20,200)
ctx.lineTo(20,20)
ctx.lineTo(200,200)
ctx.closePath()
ctx.stroke()
ctx.fill()

// Téglalap
ctx.fillStyle = "red"
ctx.strokeStyle = "green"
ctx.lineWidth = 20
ctx.fillRect(60,60,140,200)
ctx.strokeRect(60,60,140,200)

// Lila kört
ctx.beginPath()
ctx.fillStyle = "purple"
ctx.strokeStyle = "black"
ctx.lineWidth = 2
ctx.arc(200,200,50,0,2*Math.PI)
ctx.stroke()
ctx.fill()

// Szöveg
ctx.fillStyle = "white"
ctx.strokeStyle = "pink"
ctx.font = "50px consolas"
ctx.fillText("Szia Lajos!", 80, 80)
ctx.strokeText("Szia Lajos!", 80, 80)
