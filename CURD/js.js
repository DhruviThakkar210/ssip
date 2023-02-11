function init() {

  //animating form

  const button = document.querySelector('button')
  const name = document.querySelector('.name')
  const comment = document.querySelector('.comment')
  const cover = document.querySelector('.cover')
  const form = document.querySelector('form')
  let letterCount = 0


  const createGhostLetters = (text, className) =>{
    return text.split('').map( letter =>{
      return `
        <div class="${className} ${letter === ' ' ? ' blank' : ''}" >
          ${letter}
        </div>
      `
    }).join('')
  }


  const createGhostDiv = (target, className) =>{
    if (!target.value) return
    target.placeholder = ''
    const ghostDiv = document.createElement('div')
    const targetSpec = target.getBoundingClientRect()
    ghostDiv.classList.add('ghost')
    ghostDiv.innerHTML = createGhostLetters(target.value, className)

    ghostDiv.style.top = `${targetSpec.y}px`
    ghostDiv.style.left = `${targetSpec.x}px`
    ghostDiv.style.height = `${targetSpec.height}px`
    ghostDiv.style.width = `${targetSpec.width}px`

    cover.appendChild(ghostDiv)
    target.value = ''
  }


  const setupGhostLetterMotion = (target, className)=>{
    createGhostDiv(target, className)

    const letters = document.querySelectorAll(`.${className}`)
    letters.forEach((letter,i)=>{
      const letterSpec = letter.getBoundingClientRect()
      
      letter.style.top = `${letterSpec.y}px`
      letter.style.left = `${letterSpec.x}px`
      letter.style.color = 'white'
      letter.style.transition = '1s'

      setTimeout(()=>{   
        letter.style.position = 'fixed'
        letter.style.transition = '5s'
        letter.style.top = `-${window.innerHeight / 2}px`
        letter.style.left = `${letterSpec.x + window.innerWidth / 2}px`   
      },(letters.length - i) * 150)
    })
    letterCount = letterCount < letters.length ? letters.length : letterCount
  }


  const handleSubmit = e =>{
    e.preventDefault()
    form.classList.remove('fade_in')
    form.classList.add('fade')
    setupGhostLetterMotion(name,'name_letter')
    setupGhostLetterMotion(comment,'comment_letter')
  
    setTimeout(()=>{
      form.classList.remove('fade')
      form.classList.add('fade_in')
      name.placeholder = 'your name...?'
      comment.placeholder = 'enter whatever you feel like...'
      letterCount = 0
    },3000 + (letterCount * 100))
  }

  button.addEventListener('click', (e)=>handleSubmit(e))



  const starSvg = `
  <svg x="0px" y="0px" width="565.4px" height="51.4px" viewBox="0 0 565.4 51.4" >
    <style type="text/css">
    .st0{fill:#91a7b4;}
    .st1{fill:#b69269;}
    .st2{fill:#FFFFFF;}
    </style>
    <path class="st0" d="M559.7,28.5h-11.5v5.7h-5.7v0.1v17.1h-5.7V34.3v-0.1h-5.7v-5.7h-11.4v-5.7h11.4v-5.7h5.7V0h5.7v17.1h5.7v5.7
    h11.5V28.5z"/>
    <path class="st0" d="M445.5,28.7h-5.7v5.7h-5.7v-5.7h-5.7V23h5.7v-5.7h5.7V23h5.7V28.7z"/>
    <path class="st0" d="M496.9,28.6h-5.7V40h-5.7V28.6h-5.7v-5.7h5.7V11.5h5.7v11.4h5.7V28.6z"/>
    <path class="st1" d="M405.5,28.6H394v5.7h-5.7v0.1v17.1h-5.7V34.4v-0.1h-5.7v-5.7h-11.4v-5.7h11.4v-5.7h5.7V0.1h5.7v17.1h5.7v5.7
    h11.5V28.6z"/>
    <path class="st2" d="M148.5,28.5H137v5.7h-5.7v0.1v17.1h-5.7V34.3v-0.1h-5.7v-5.7h-11.4v-5.7h11.4v-5.7h5.7V0h5.7v17.1h5.7v5.7h11.5
    V28.5z"/>
    <path class="st2" d="M34.3,28.7h-5.7v5.7h-5.7v-5.7h-5.7V23h5.7v-5.7h5.7V23h5.7V28.7z"/>
    <path class="st2" d="M85.7,28.6H80V40h-5.7V28.6h-5.7v-5.7h5.7V11.5H80v11.4h5.7V28.6z"/>
    <path class="st1" d="M291.2,28.7h-5.7v11.4h-5.7V28.7h-5.7V23h5.7V11.6h5.7V23h5.7V28.7z"/>
    <path class="st1" d="M348.4,28.6h-5.7v5.7H337v11.5h-5.7V34.3h-5.7v-5.7h-5.7v-5.7h5.7v-5.7h5.7V5.8h5.7v11.4h5.7v5.7h5.7
    L348.4,28.6L348.4,28.6z"/>
    <g>
    <g id="XMLID_7_">
      <g>
        <rect x="177.1" y="22.9" class="st1" width="5.7" height="5.7"/>
      </g>
    </g>
    </g>
    <g>
    <g id="XMLID_6_">
      <g>
        <rect x="225.6" y="20" class="st1" width="11.5" height="11.4"/>
      </g>
    </g>
    </g>
  </svg>
  `

  const animationPatterns = [
    ['0','1'],['0','1'],['0','1'],['0','1'],['0','1'],
    ['1','1'],['1','1'],['1','1'],['1','1'],
    ['2','2'],['2','2'],
    ['0','2'],['0','2'],
    ['3','5'],['3','5'],
    ['8','9'],['8','9'],
    ['3','6'],['3','6'],
    ['9','10'],['9','10'],
    ['10','10'],['10','10'],
    ['3','7'],
    ['6','7']
  ]

  const wrapper = document.querySelector('.wrapper')
  const frameSize = 15


  //star blinking animation
  const animateStar = (target, start, end, speed) => {
    let i = start   
    setInterval(function () {
      target.style.margin = `0px ${-(i * frameSize)}px`
      if (i >= end) {
        i = start
      } else {
        i++
      }
    }, speed)
  }


  //position stars
  const stars = new Array(70).fill('')
  stars.forEach(()=>{
    const animationPattern = animationPatterns[Math.floor(Math.random() * animationPatterns.length)]
    const speed = Math.random() < 0.1 ?
      140
      :
      300
  
    const starDiv = document.createElement('div')
    starDiv.classList.add('star')
      
    const starInside = document.createElement('div')
    starInside.classList.add('star_inner')
    starInside.innerHTML = starSvg
    starInside.style.width = `${frameSize * 11}px`
  
    starDiv.appendChild(starInside)
    starDiv.style.top = `${Math.ceil(Math.random() * 100)}%`
    starDiv.style.left = `${Math.ceil(Math.random() * 100)}%`
    wrapper.appendChild(starDiv)
  
    animateStar(starInside, animationPattern[0], animationPattern[1], speed)
  })

}

window.addEventListener('DOMContentLoaded', init)



