-- BEGIN Table creation
CREATE TABLE App_User (
    u_id SERIAL,
    u_name text NOT NULL,
    u_email text NOT NULL,
    u_password varchar(128) NOT NULL,
    u_salt varchar(128) NOT NULL
);

CREATE TABLE Login_Attempt (
    la_app_user_id int NOT NULL,
    la_time int NOT NULL,
    la_success boolean NOT NULL,
    la_desc text NOT NULL DEFAULT 'normal'
);

CREATE TABLE Account_State (
    as_app_user_id int NOT NULL,
    as_delay_login int NOT NULL DEFAULT 0, -- after to many unsuccessful login, we change zero to current timestamp + 120 seconds.
    as_brute_force int NOT NULL DEFAULT 0, -- number of time the account has been under brute force attack, if >= 2, the account is banned
    as_banned boolean NOT NULL DEFAULT false  -- if true, the user is banned permanently, unless an admin grant access again.
);

CREATE TABLE App_Config (
    ac_id SERIAL,
    ac_index varchar(100) NOT NULL,
    ac_value varchar(255) NOT NULL
);
-- END Table creation

-- BEGIN Insertion
INSERT INTO App_User (u_name, u_email, u_password, u_salt) VALUES('charles', 'charles.foster.offdensen@dethklok.com', '74a00d41e7a48c424bab84f0b6cc1f7b8474c292966c8783031b6c68354a3adeff1800ac857197635a284f17affa64a90f055951ce52f650dc46912e5f78fb2d', 'b3a25747a3decb7705cafc3fb2ff95a21fb9ad81e95a065efe2c58d4f75d46e557ef1b886c9d24a951e187df8164eb04605c5d69143d3793100e8b2b5c333527'); -- password = money

INSERT INTO Account_State (as_app_user_id) VALUES(1);
-- END Insertion