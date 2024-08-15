let singin = document.getElementById("singin")
let create = document.querySelector(".create")
let boxform = document.querySelector(".boxform")
let singin2 = document.querySelector(".singin")
let back = document.querySelector(".back")

singin.addEventListener("click",(e)=>{
    e.preventDefault()
    boxform.style.display='none'
    singin2.style.display='block'

    
})
back.addEventListener("click",(e)=>{
    e.preventDefault()
    boxform.style.display='block'
    singin2.style.display='none'

    
})

