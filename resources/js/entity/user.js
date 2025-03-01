import axios from "axios";
import { getUser } from "../api";

// js/entity/user.js

const users = async () => {
    try {
        let users = await getUser();
        return users.data;
    } catch (error) {
        console.error(error);
    }
};
users();
// js/entity/user.js
