<template>
    <div class="container">
        <img class="logo" src="../assets/hobo.png">
        <div class="margin">
            <div class="textInput">
                <div class="input">
                    <label>Email</label>
                    <input placeholder="johanbakker@gmail.com" type="email">
                </div>
                <div class="input">
                    <label>Password</label>
                    <input placeholder="Geheim123" type="password">
                </div>
                <q-btn no-caps flat square class="submit" @click="login">Login</q-btn>
                <label class="register"><RouterLink  to="/register">Register</RouterLink> instead.</label>
            </div>
        </div>
    </div>
    
</template>

<style scoped>
.container {
    animation: fadeInAnimation .5s;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
    padding: 30px 0px;
    background-color: #444444;
    border: 1px solid rgba(255, 255, 255, 0.3);
    width: 400px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.logo {
    max-width: 50%;
    text-align: center;
    margin-bottom: 30px;
}

.margin {
    margin: 0px 30px;
}


.input label {
    color: rgb(255, 255, 255);
}

input[type=text],
input[type=password],
input[type=email] {
    color: white;
    width: calc(100%);
    padding: 10px;
    outline: none;
    border: none;
    background-color: rgb(48, 48, 48);
}

.input {
    text-align: left;
    margin-bottom: 10px;
}

.input:last-child {
    margin-bottom: 0;
    margin-top: 30px;
}
.input:last-child > label {
    text-align: center;
    padding: 10px 0;
}

.submit {
    width: 100%;
    padding: 10px;
    border: 1px solid #5c8333;
    background-color: #92d051;
    margin: 10px 0;
    color: white;
}

.register {
    padding-top: 10px;
    color: white;
}

.register a {
    text-decoration: none;
    color: #5b9bd5
}

@keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
</style>