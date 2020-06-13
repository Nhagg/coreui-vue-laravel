import axios from "axios"

export default class Home {
  async getLessons(){
    let res
    res = await axios.get('http://118.70.161.155:8880/api/lessions')
    return res
  }
}