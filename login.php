<!DOCTYPE html>
 <title>Login</title>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }
      .login-box {
        width: 300px;
        margin: 100px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px #888888;
      }
      h2 {
        text-align: center;
        color: #333;
      }
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
      }
      button:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <div class="login-box">
      <h2>Login</h2>
      <form action="/login.php" method="get">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password">
        <button type="submit">Login</button>
      </form>
    </div>
  </body>
</html>
