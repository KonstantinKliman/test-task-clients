import axios from "axios";

const API_BASE_URL = 'http://0.0.0.0:80/api/v1';

const api = axios.create({
    headers: {
        "Content-type" : "application/json"
    },
    baseURL: API_BASE_URL,
});

export default api;