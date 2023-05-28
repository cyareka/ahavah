CREATE DATABASE Ahavah_DB;

use Ahavah_DB;

-- CREATE TABLES --
CREATE TABLE Service (
	SERVICE_ID VARCHAR(5) PRIMARY KEY,
	PRICE DECIMAL(8) NOT NULL,
	MED_ID VARCHAR(6) NOT NULL,

	PRIMARY KEY (SERVICE_ID),
	FOREIGN KEY (MED_ID) REFERENCES Inventory(MED_ID)
);

CREATE TABLE Indiv_Service (
	SERVICE_ID VARCHAR(5),
	IS_NAME VARCHAR(20) NOT NULL,
	IS_DESC VARCHAR(500),

	PRIMARY KEY (SERVICE_ID),
	FOREIGN KEY (SERVICE_ID) REFERENCES Service(SERVICE_ID)
);

CREATE TABLE Bundled_Service (
	SERVICE_ID VARCHAR(5),
	BS_NAME VARCHAR(20) NOT NULL,
	BS_DESC VARCHAR(500),

	PRIMARY KEY (SERVICE_ID),
	FOREIGN KEY (SERVICE_ID) REFERENCES Service(SERVICE_ID)
);

CREATE TABLE Reservation (
	RES_ID VARCHAR (10) PRIMARY KEY,
	RES_DATE DATE NOT NULL,
	HAIRD_ID VARCHAR(9) NOT NULL, 
	CLIENT_ID VARCHAR(9) NOT NULL,
	SERVICE_ID VARCHAR(5) NOT NULL,
	PAY_ID VARCHAR(10) NOT NULL,
	APPT_DATE DATE NOT NULL,

	PRIMARY KEY (RES_ID),
	FOREIGN KEY (HAIRD_ID) REFERENCES Hairdresser(HAIRD_ID),
	FOREIGN KEY (CLIENT_ID) REFERENCES Clients(CLIENT_ID),
	FOREIGN KEY (SERVICE_ID) REFERENCES Service(SERVICE_ID),
	FOREIGN KEY (PAY_ID) REFERENCES Payment(PAY_ID)
);

CREATE TABLE Payment (
	PAY_ID VARCHAR(10) PRIMARY KEY,
	AMOUNT DECIMAL(10, 0) NOT NULL,
	PAY_TYPE VARCHAR(20) NOT NULL,
	PAY_RECEIPT MEDIUMBLOB NOT NULL,
	PAY_STATUS VARCHAR(40) NOT NULL;
);

CREATE TABLE Clients (
	CLIENT_ID VARCHAR(9) PRIMARY KEY,
    CLIENT_FNAME VARCHAR(40) NOT NULL,
    CLIENT_LNAME VARCHAR(40) NOT NULL,
    CLIENT_PNAME VARCHAR(40),
    CLIENT_PHONE VARCHAR(13) NOT NULL,
    CLIENT_MSNGR VARCHAR(40) NOT NULL
);

CREATE TABLE ClientCount (
	YEAR INT PRIMARY KEY,
    COUNT INT
);

CREATE TABLE Hairdressers ( 
	HAIRD_ID VARCHAR(9) PRIMARY KEY,
	HAIRD_FNAME VARCHAR(40) NOT NULL,
	HAIRD_LNAME VARCHAR(40) NOT NULL,
	HAIRD_PHONE VARCHAR(13) NOT NULL,
	HAIRD_MSNGR VARCHAR(40) NOT NULL
);

CREATE TABLE HairDCount (
	YEAR INT PRIMARY KEY,
    COUNT INT
);

CREATE TABLE Inventory (
	MED_ID VARCHAR(6) PRIMARY KEY,
	MED_TYPE VARCHAR(40) NOT NULL,
	QUANTITY INT NOT NULL,
	SOURCE_LOCATION VARCHAR(40) NOT NULL,
	SUPPLIER_NAME VARCHAR(40) NOT NULL,
	SUPPLIER_PHONE VARCHAR(13) NOT NULL,
	BATCH_NO INT NOT NULL
);

CREATE TABLE MedCount (
	YEAR INT PRIMARY KEY,
    COUNT INT
);

-- START OF INSERT CLIENT PROCEDURE --
DELIMITER //
CREATE PROCEDURE InsertClient(
	IN p_CLIENT_FNAME VARCHAR(40),
    IN p_CLIENT_LNAME VARCHAR(40),
    IN p_CLIENT_PNAME VARCHAR(40),
    IN p_CLIENT_PHONE VARCHAR(13),
    IN p_CLIENT_MSNGR VARCHAR(40)
)
BEGIN
	DECLARE v_YEAR INT;
    DECLARE v_COUNT VARCHAR(8); -- Store concatenated value of YYYY and NNNN
    DECLARE v_CURRENT_COUNT INT;
    
    SET v_YEAR = YEAR(curdate());
    
    -- Get the current count of clients for the year
    SELECT COUNT INTO v_COUNT FROM ClientCount WHERE YEAR = v_YEAR;
    
    IF v_COUNT IS NULL THEN
		-- If the count of clients for the year doesn't exist, initialize it to 0001
		SET v_COUNT = CONCAT(v_YEAR, '0001');
	ELSE
		-- Increment the client count and stop inserting for the year if it exceeds 9999
        SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);
    
		IF v_CURRENT_COUNT + 1 > 9999 THEN
			-- If count exceeds 9999, do not insert and throw a custom error
			SIGNAL SQLSTATE '45001' 
			SET MESSAGE_TEXT = 'Count has exceeded 9999 clients 
								for this year. Insertion stopped.';
		ELSE
			SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
		END IF;	
	END IF;
    
    -- Insert new client record
	INSERT INTO Clients (CLIENT_ID, CLIENT_FNAME, CLIENT_LNAME, CLIENT_PNAME, CLIENT_PHONE, CLIENT_MSNGR)
	VALUES (CONCAT('C', v_COUNT), p_CLIENT_FNAME, p_CLIENT_LNAME, p_CLIENT_PNAME, p_CLIENT_PHONE, p_CLIENT_MSNGR);
    
    -- Update the client count for the year in the ClientCount table
    REPLACE INTO ClientCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);
END //
-- END OF CLIENT PROCEDURE --

-- START OF INSERT HAIRDRESSER PROCEDURE --
DELIMITER //
CREATE PROCEDURE InsertHairD (
	IN p_HAIRD_FNAME VARCHAR (40),
    IN p_HAIRD_LNAME VARCHAR (40),
    IN p_HAIRD_PHONE VARCHAR (13),
    IN p_HAIRD_MSNGR VARCHAR (40)
)
BEGIN
	DECLARE v_YEAR INT;
    DECLARE v_COUNT VARCHAR(8); -- Store concatenated value of YYYY and NNNN
    DECLARE v_CURRENT_COUNT INT;
    
    SET v_YEAR = YEAR(curdate());
    
    -- Get the current count of clients for the year
    SELECT COUNT INTO v_COUNT FROM HairDCount WHERE YEAR = v_YEAR;
    
    IF v_COUNT IS NULL THEN
		-- If the count of hairdressers for the year doesn't exist, initialize it to 0001
		SET v_COUNT = CONCAT(v_YEAR, '0001');
	ELSE
		-- Increment the hairdressers count and stop inserting for the year if it exceeds 9999
        SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);
    
		IF v_CURRENT_COUNT + 1 > 9999 THEN
			-- If count exceeds 9999, do not insert and throw a custom error
			SIGNAL SQLSTATE '45002' 
			SET MESSAGE_TEXT = 'Count has exceeded 9999 hairdressers 
								for this year. Insertion stopped.';
		ELSE
			SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
		END IF;	
	END IF;
    
    -- Insert new hairdresser record
	INSERT INTO Hairdressers (HAIRD_ID, HAIRD_FNAME, HAIRD_LNAME, HAIRD_PHONE, HAIRD_MSNGR)
	VALUES (CONCAT('H', v_COUNT), p_HAIRD_FNAME, p_HAIRD_LNAME, p_HAIRD_PHONE, p_HAIRD_MSNGR);
    
    -- Update the hairdresser count for the year in the HairDCount table
    REPLACE INTO HairDCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);
END //
-- END OF INSERT HAIRDRESSER PROCEDURE --

-- START OF INSERT MEDICINE PROCEDURE --
DELIMITER //
CREATE PROCEDURE InsertMed (
	IN p_MED_TYPE VARCHAR (40),
    IN p_QUANTITY INT,
    IN p_SOURCE_LOCATION VARCHAR (40),
    IN p_SUPPLIER_NAME VARCHAR(40),
    IN p_SUPPLIER_PHONE VARCHAR(13),
    IN p_BATCH_NO INT
)
BEGIN
	DECLARE v_YEAR INT;
    DECLARE v_COUNT VARCHAR(8); -- Store concatenated value of YYYY and NNNN
    DECLARE v_CURRENT_COUNT INT;
    
    SET v_YEAR = YEAR(curdate());
    
    -- Get the current count of medicines for the year
    SELECT COUNT INTO v_COUNT FROM MedCount WHERE YEAR = v_YEAR;
    
    IF v_COUNT IS NULL THEN
		-- If the count of medicines for the year doesn't exist, initialize it to 0001
		SET v_COUNT = CONCAT(v_YEAR, '0001');
	ELSE
		-- Increment the medicine count and stop inserting for the year if it exceeds 9999
        SET v_CURRENT_COUNT = SUBSTRING(v_COUNT, 5);
    
		IF v_CURRENT_COUNT + 1 > 9999 THEN
			-- If count exceeds 9999, do not insert and throw a custom error
			SIGNAL SQLSTATE '45003' 
			SET MESSAGE_TEXT = 'Count has exceeded 9999 medicines 
								for this year. Insertion stopped.';
		ELSE
			SET v_COUNT = CONCAT(v_YEAR, LPAD(v_CURRENT_COUNT + 1, 4, '0'));
		END IF;	
	END IF;
    
    -- Insert new medicine record
	INSERT INTO Inventory (MED_ID, MED_TYPE, QUANTITY, SOURCE_LOCATION, SUPPLIER_NAME, SUPPLIER_PHONE, BATCH_NO)
	VALUES (CONCAT('M', v_COUNT), p_MED_TYPE, p_QUANTITY, p_SOURCE_LOCATION, p_SUPPLIER_NAME, p_SUPPLIER_PHONE, p_BATCH_NO);
    
    -- Update the medicine count for the year in the MedCount table
    REPLACE INTO MedCount (YEAR, COUNT) VALUES (v_YEAR, v_COUNT);
END //
-- END OF INSERT MEDICINE PROCEDURE --