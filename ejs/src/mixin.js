const mixin = {
  methods: {
    compareResult(userAnswer, correctAnswer, item) {
      let ans = correctAnswer.replace(/\./g, '')
      ans = ans.replace(/・/g, '')
      if(userAnswer == ans) {
        return item.score
      }
      let compareHTML = ''
      let correctArr = ans.split('')
      let userArr = userAnswer.split('')
      const lengthUserArr = userArr.length
      const lengthCorrectArr = correctAnswer.length
      let point = 0
      correctArr.forEach((text, index) => {
        const compareIndex = parseInt((index + 1) * lengthUserArr / lengthCorrectArr)
        let acceptedArr = [
          userArr[index],
          userArr[index + 1],
          userArr[index -1],
          userArr[compareIndex],
          userArr[compareIndex - 1],
          userArr[compareIndex + 1]
        ]
        if(acceptedArr.indexOf(text) > -1) {
          point ++
          compareHTML += '<span class="text-green">'+ text +'</span>'
        } else {
          compareHTML += '<span class="text-red">' + text +'</span>'
        }
      })
      this.compareHTML = compareHTML
      return parseInt(point * item.score / lengthCorrectArr)
    }
  }
}

export default mixin