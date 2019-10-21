import Axios from 'axios'

const axios = Axios.create({
    withCredentials: true
});

axios.defaults.headers.common['X-TOKEN'] = '2d4e69f4823176197ccf41caa5ee6456';

export default axios
