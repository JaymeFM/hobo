<template>
    <div class="container">
        <img class="logo" src="../assets/hobo.png">
        <div class="margin">
            <div class="textInput">
                <div class="input">
                    <label>Voornaam</label>
                    <input placeholder="Tim" type="text">
                </div>
                <div class="input">
                    <label>Tussenvoegsel</label>
                    <input placeholder="Tim" type="text">
                </div>
                <div class="input">
                    <label>Achternaam</label>
                    <input placeholder="Tim" type="text">
                </div>
                <div class="input">
                    <label>Email</label>
                    <input placeholder="timlovesfurries@gmail.com" type="email">
                </div>
                <div class="input">
                    <label>Password</label>
                    <input placeholder="CollinIsGay123" type="password">
                </div>
                <div class="input">
                    <label>Confirm Password</label>
                    <input placeholder="CollinIsGay123" type="password">
                </div>
                <button class="submit">Register</button>
                <label class="register"><RouterLink  to="/login">Login</RouterLink> instead.</label>
            </div>
        </div>
    </div>
    
</template>

<style scoped>
.container {
    animation: fadeInAnimation .5s;
    padding: 30px 0px;
    background-color: #fff;
    border-radius: 20px;
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
    color: rgb(60,60,60);
}

input[type=text],
input[type=password],
input[type=email] {
    width: calc(100% - 20px);
    padding: 10px;
    border-radius: 10px;
    outline: none;
    border: none;
    background-color: lightgrey;
    border: 1px solid grey;
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
    border-radius: 10px;
    border: 1px solid #5c8333;
    background-color: #92d051;
    margin: 10px 0;
    color: white;
}

.register {
    padding-top: 10px;
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