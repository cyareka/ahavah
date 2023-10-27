<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
$port = "3308";

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// CREATE DATABASE
$sql = "CREATE DATABASE IF NOT EXISTS Ahavah_DB";

IF ($conn->query($sql)===TRUE) {
    echo "Database created successfully<br/>";
} else {
    echo "Error creating database: " . $conn->error . "<br/>";
}

//Close the database connection
$conn->close();

$dbname = "Ahavah_DB";

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// SELECT DATABASE
$conn->select_db($dbname);

// CREATE TABLES
    
    // INVENTORY START
    $sql = "CREATE TABLE IF NOT EXISTS Inventory (
        MED_ID VARCHAR(9) PRIMARY KEY,
        MED_TYPE VARCHAR(40) NOT NULL,
        QUANTITY INT NOT NULL,
        SOURCE_LOCATION VARCHAR(40) NOT NULL,
        SUPPLIER_NAME VARCHAR(40) NOT NULL,
        SUPPLIER_PHONE VARCHAR(13) NOT NULL,
        BATCH_NO INT NOT NULL
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Inventory created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS MedCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table MedCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // INVENTORY END




    // SERVICES START
    $sql = "CREATE TABLE IF NOT EXISTS Services (
        SERVICE_ID VARCHAR(10) PRIMARY KEY,
        PRICE DECIMAL(10,0) NOT NULL,
        MED_ID VARCHAR(9),

        FOREIGN KEY (MED_ID) REFERENCES Inventory(MED_ID)
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Services created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS ServiceCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table ServiceCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // SERVICES END




    // INDIV_SERVICES START
    $sql = "CREATE TABLE IF NOT EXISTS Indiv_Services (
        SERVICE_ID VARCHAR(10) PRIMARY KEY,
        IS_NAME VARCHAR(20) NOT NULL,
        IS_DESC VARCHAR(500),

        FOREIGN KEY (SERVICE_ID) REFERENCES Services(SERVICE_ID)
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Indiv_Services created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS ISCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table ISCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // INDIV_SERVICES END




    // BUNDLED_SERVICES START
    $sql = "CREATE TABLE IF NOT EXISTS Bundled_Services (
        SERVICE_ID VARCHAR(10) PRIMARY KEY,
        BS_NAME VARCHAR(20) NOT NULL,
        BS_DESC VARCHAR(500),

        FOREIGN KEY (SERVICE_ID) REFERENCES Services(SERVICE_ID)
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Bundled_Services created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS BSCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table BSCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // BUNDLED_SERVICES END




    // RESERVATIONS START
    $sql = "CREATE TABLE IF NOT EXISTS Reservations (
        RES_ID VARCHAR(9) PRIMARY KEY,
        RES_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        HAIRD_ID VARCHAR(9) NOT NULL,
        CLIENT_ID VARCHAR(9) NOT NULL,
        SERVICE_ID VARCHAR(9) NOT NULL,
        PAY_ID VARCHAR(9) NOT NULL,
        APPT_DATE DATE NOT NULL,

        FOREIGN KEY (HAIRD_ID) REFERENCES Hairdressers(HAIRD_ID),
        FOREIGN KEY (CLIENT_ID) REFERENCES Clients(CLIENT_ID),
        FOREIGN KEY (SERVICE_ID) REFERENCES Services(SERVICE_ID),
        FOREIGN KEY (PAY_ID) REFERENCES Payments(PAY_ID)
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Reservations created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS ResCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table ResCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // RESERVATIONS END




    // PAYMENTS START
    $sql = "CREATE TABLE IF NOT EXISTS Payments (
        PAY_ID VARCHAR(9) PRIMARY KEY,
        AMOUNT DECIMAL(10,0) NOT NULL,
        PAY_TYPE VARCHAR(20) NOT NULL,
        PAY_RECEIPT MEDIUMBLOB NOT NULL,
        PAY_STATUS VARCHAR(40) NOT NULL
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Payments created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS PayCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table PayCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // PAYMENTS END




    // CLIENTS START
    $sql = "CREATE TABLE IF NOT EXISTS Clients (
        CLIENT_ID VARCHAR(9) PRIMARY KEY,
        CLIENT_FNAME VARCHAR(40) NOT NULL,
        CLIENT_LNAME VARCHAR(40) NOT NULL,
        CLIENT_PNAME VARCHAR(40),
        CLIENT_PHONE VARCHAR(13) NOT NULL,
        CLIENT_MSNGR VARCHAR(40) NOT NULL
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Clients created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS ClientCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table ClientCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // CLIENTS END




    // HAIRDRESSERS START
    $sql = "CREATE TABLE IF NOT EXISTS Hairdressers (
        HAIRD_ID VARCHAR(9) PRIMARY KEY,
        HAIRD_FNAME VARCHAR(40) NOT NULL,
        HAIRD_LNAME VARCHAR(40) NOT NULL,
        HAIRD_PHONE VARCHAR(13) NOT NULL,
        HAIRD_MSNGR VARCHAR(40) NOT NULL
    )";

    if ($conn->query($sql)===TRUE) {echo "Table Hairdressers created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}

    $sql = "CREATE TABLE IF NOT EXISTS HairDCount (
        YEAR INT PRIMARY KEY,
        COUNT INT
    )";

    if ($conn->query($sql)===TRUE) {echo "Table HairDCount created successfully<br/>";} 
    else {echo"Error creating table: " . $conn->error;}
    // HAIRDRESSERS END




// PROCEDURES START

    // SERVICES PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertService(
        IN p_SERVICE_ID VARCHAR(10),
        IN p_PRICE DECIMAL(10,0),
        IN p_MED_ID VARCHAR(9)
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CURRENT COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM ServiceCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45001'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 services for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW INDIV SERVICE RECORD
        INSERT INTO Services (SERVICE_ID, PRICE, MED_ID)
        VALUES (p_SERVICE_ID, p_PRICE, p_MED_ID);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO ServiceCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertService Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // SERVICES PROCEDURE END




    // INDIV_SERVICES PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertIS(
        IN p_IS_NAME VARCHAR(20),
        IN p_IS_DESC VARCHAR(500)
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CUR COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM ISCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45002'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 services for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW INDIVE_SERVICE RECORD
        INSERT INTO Indiv_Services (SERVICE_ID, IS_NAME, IS_DESC)
        VALUES (CONCAT('IS', v_COUNT), p_IS_NAME, p_IS_DESC);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO ISCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertIS Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // INDIV_SERVICES PROCEDURE END




    // BUNDLED_SERVICES PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertBS(
        IN p_BS_NAME VARCHAR(20),
        IN p_BS_DESC VARCHAR(500)
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CUR COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM BSCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45003'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 bundled services for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW BUNDLED_SERVICE RECORD
        INSERT INTO Bundled_Services (SERVICE_ID, BS_NAME, BS_DESC)
        VALUES (CONCAT('BS', v_COUNT), p_BS_NAME, p_BS_DESC);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO BSCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertBS Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // BUNDLED_SERVICES PROCEDURE END




    // RESERVATIONS PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertRes(
        IN p_HAIRD_ID VARCHAR(9),
        IN p_CLIENT_ID VARCHAR(9),
        IN p_SERVICE_ID VARCHAR(9),
        IN p_PAY_ID VARCHAR(9),
        IN p_APPT_DATE DATE
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CUR COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM ResCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45004'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 reservations for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW RESERVATION RECORD
        INSERT INTO Reservations (RES_ID, HAIRD_ID, CLIENT_ID, SERVICE_ID, PAY_ID, APPT_DATE)
        VALUES (CONCAT('R', v_COUNT), p_HAIRD_ID,p_CLIENT_ID, p_SERVICE_ID, p_PAY_ID, p_APPT_DATE);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO ResCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertRes Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // RESERVATIONS PROCEDURE END




    // PAYMENTS PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertPay(
        IN p_AMOUNT DECIMAL(10, 0),
        IN p_PAY_TYPE VARCHAR(20),
        IN p_PAY_RECEIPT MEDIUMBLOB,
        IN p_PAY_STATUS VARCHAR(40)
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CUR COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM PayCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45005'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 payments for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW PAYMENT RECORD
        INSERT INTO Payments (PAY_ID, AMOUNT, PAY_TYPE, PAY_RECEIPT, PAY_STATUS)
        VALUES (CONCAT('P', v_COUNT), p_AMOUNT, p_PAY_TYPE, p_PAY_RECEIPT, p_PAY_STATUS);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO PayCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertPay Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // PAYMENTS PROCEDURE END




    // CLIENTS PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertClient(
        IN p_CLIENT_FNAME VARCHAR(40),
        IN p_CLIENT_LNAME VARCHAR(40),
        IN p_CLIENT_PNAME VARCHAR(40),
        IN p_CLIENT_PHONE VARCHAR(13),
        IN p_CLIENT_MSNGR VARCHAR(40)
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CURRENT COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM ClientCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45006'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 clients for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW CLIENT RECORD
        INSERT INTO Clients (CLIENT_ID, CLIENT_FNAME, CLIENT_LNAME, CLIENT_PNAME, CLIENT_PHONE, CLIENT_MSNGR)
        VALUES (CONCAT('C', v_COUNT), p_CLIENT_FNAME, p_CLIENT_LNAME, p_CLIENT_PNAME, p_CLIENT_PHONE, p_CLIENT_MSNGR);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO ClientCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertClient Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // CLIENTS PROCEDURE START




    // HAIRDRESSERS PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertHairD(
        IN p_HAIRD_FNAME VARCHAR(40),
        IN p_HAIRD_LNAME VARCHAR(40),
        IN p_HAIRD_PHONE VARCHAR(13),
        IN p_HAIRD_MSNGR VARCHAR(40)
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CURRENT COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM HairDCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45007'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 hairdressers for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW HAIRDRESSER RECORD
        INSERT INTO Hairdressers (HAIRD_ID, HAIRD_FNAME, HAIRD_LNAME, HAIRD_PHONE, HAIRD_MSNGR)
        VALUES (CONCAT('H', v_COUNT), p_HAIRD_FNAME, p_HAIRD_LNAME, p_HAIRD_PHONE, p_HAIRD_MSNGR);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO HairDCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertHairD Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // HAIRDRESSERS PROCEDURE END




    // INVENTORY PROCEDURE START
    $sql = "CREATE PROCEDURE IF NOT EXISTS InsertMed(
        IN p_MED_TYPE VARCHAR(40),
        IN p_QUANTITY INT,
        IN p_SOURCE_LOCATION VARCHAR(40),
        IN p_SUPPLIER_NAME VARCHAR(40),
        IN p_SUPPLIER_PHONE VARCHAR(13),
        IN p_BATCH_NO INT
    )
    BEGIN
        DECLARE v_YEAR INT;
        DECLARE v_COUNT VARCHAR(8); -- STORE CONCAT VAL OF YYYY AND NNNN
        DECLARE v_CURRENT_COUNT INT;

        SET v_YEAR = YEAR(curdate());
        
        -- GET CURRENT COUNT OF YEAR
        SELECT COUNT INTO v_COUNT FROM MedCount WHERE YEAR = v_YEAR;

        IF v_COUNT IS NULL THEN -- IF COUNT TABLE DOESN'T EXIST, INIT TO 0001
            SET v_COUNT = CONCAT(v_YEAR, '0001');

        ELSE -- INCREMENT COUNT AND STOP INSERTING FOR THE YEAR IF IT EXCEEDS 9999
            SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);

            IF v_CURRENT_COUNT + 1 > 9999 THEN
                -- IF COUNT EXCEEDS 9999, DO NOT INSERT AND THROW CUSTOM ERROR
                SIGNAL SQLSTATE '45008'
                SET MESSAGE_TEXT = 'Count has exceeded 9999 medicines for this year. Insertion stopped.';
            ELSE
                SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
            END IF;
        END IF;

        -- INSERT NEW MEDICINE RECORD
        INSERT INTO Inventory (MED_ID, MED_TYPE, QUANTITY, SOURCE_LOCATION, SUPPLIER_NAME, SUPPLIER_PHONE, BATCH_NO)
        VALUES (CONCAT('M', v_COUNT), p_MED_TYPE, p_QUANTITY, p_SOURCE_LOCATION, p_SUPPLIER_NAME, p_SUPPLIER_PHONE, p_BATCH_NO);

        -- UPDATE COUNT FOR THE YEAR IN COUNT TABLE
        REPLACE INTO MedCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);

    END
    ";

    if ($conn->query($sql)===TRUE) {echo "InsertMed Procedure created successfully<br/>";} 
    else {echo"Error creating procedure: " . $conn->error;}
    // INVENTORY PROCEDURE END

// PROCEDURES END
?>