<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>𝐈𝐂𝐁𝐓 𝐕𝐈𝐏 𝐆𝐘𝐌</title>
</head>


<body>
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">

                <ul class="list">
                <li>
                     <a href="1Admin\loginAdmin.php">
                     <button class="submit1 submit1-animated">Admin</button>
                     </a>
                </li>
                <li>
                    <a href="2Staff\loginStaff.php">
                 <button class="submit1 submit1-animated">Staff</button>
        </a>
      </li>
      <li>
        <a href="3Member\loginMember.php">
          <button class="submit1 submit1-animated">Member</button>
        </a>
      </li>
    </ul>

                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>𝐈𝐂𝐁𝐓 𝐕𝐈𝐏 𝐆𝐘𝐌</h2>
                    <div class="right-inductor right-inductor-animated">
                        <img src="img/logo.jpg" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<style>
body {
  background-image: url('img/backgrnd1.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}

.login {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login_box {
  display: flex;
  width: 80%;
  height: 80%;
  background-color: rgba(255, 255, 255, 0.8);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}

.left {
  width: 40%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact {
    display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    height: 100%;
    width: 73%;
    margin: auto;
}

.list {
  list-style-type: none;
  padding: 220;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  height: 100%;
}

.list li {
  text-align: center;
}


.submit1-animated {
  position: relative;
  overflow: hidden;
}

.submit1-animated:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.2));
  z-index: 2;
  transition: transform 0.5s ease-out;
  transform: translateX(-100%);
}

.submit1-animated:hover:before {
  transform: translateX(100%);
}

.submit1 {
  font-family: 'Merriweather' Arial, Helvetica, sans-serif;
  border: none;
  padding: 15px 70px;
  border-radius: 8px;
  display: block;
  width: 260px;
  margin: auto;
  margin-top: 80px;
  margin-bottom: 60px;
  background: #1a1a47;
  color: #fff;
  font-weight: bold;
  font-size: large;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
  -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
  box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
}
.submit1:hover {
            background-color: #2f2f66;
        }

.right {
  width: 60%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.right-text {
  text-align: center;
}

.right-inductor-animated {
  position: relative;
  overflow: hidden;
}

.right-inductor-animated img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 120%;
  height: auto;
  transition: transform 1s ease-out;
  transform: translate(-50%, -50%) scale(1);
}

.right-inductor-animated:hover img {
  transform: translate(-50%, -50%) scale(1.2);
}

.right-inductor {
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background-image: url('img/logo.jpg');
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
  margin-bottom: 20px;
}
h2 {
    font-family: 'Arial', sans-serif;
    font-size: 3rem;
    color: #003;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    margin-bottom: 2rem;
        }
</style>
