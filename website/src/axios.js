import Axios from 'axios';

const axios = Axios.create({
	baseURL: "http://localhost:8000",
	withCredentials: true,
    headers: {
		"Accept": "application/json",
        "Content-Type": "application/json",
	},
});

export default axios;
