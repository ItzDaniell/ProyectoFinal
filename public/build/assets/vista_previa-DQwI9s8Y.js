document.addEventListener("DOMContentLoaded",()=>{const t=document.getElementById("imagen"),e=document.getElementById("preview");t&&t.addEventListener("change",a=>{const d=a.target.files[0];if(d){const s=new FileReader;s.onload=function(c){e.src=c.target.result,e.classList.remove("hidden")},s.readAsDataURL(d)}else e.src="#",e.classList.add("hidden")});const n=document.getElementById("clear-button");n&&n.addEventListener("click",()=>{e.src="#",e.classList.add("hidden"),t.value=""})});