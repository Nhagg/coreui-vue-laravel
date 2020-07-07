import axios from "axios"
let defaultData = {
  lession_id: 0,
  learn_unit_id: 0,
  learn_item_id: 0,
  progress: 0,
  user_id: 1
}
async function savePoint(data = defaultData){
  let res
  res = await axios.post(window.DOMAIN_API + '/api/lessions', data,
    {
      headers: {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET, PUT, POST, DELETE, OPTIONS',
        'Content-Type': 'application/json',
      }
    })
  return res
}
export default {
  savePoint
}