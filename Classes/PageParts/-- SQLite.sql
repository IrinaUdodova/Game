-- SQLite
INSERT INTO Auth(UserName, UserCache)
VALUES ("root", "proot");

SELECT *
FROM AUTH;

INSERT INTO Profile(AuthId, Balance)
SELECT ID, -100
FROM Auth
WHERE UserName = "root";

SELECT a.UserName, p.Balance
FROM Auth AS a, Profile AS p
WHERE p.AuthId = a.ID AND a.UserName="root" 
   AND a.UserCache="";