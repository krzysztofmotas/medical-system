--------------------------------------------------------
--  File created - czwartek-maja-23-2024   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table DOCTORS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."DOCTORS" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"NAME" VARCHAR2(50 BYTE), 
	"LAST_NAME" VARCHAR2(50 BYTE), 
	"SPECIALIZATION" VARCHAR2(100 BYTE), 
	"PHONE_NUMBER" VARCHAR2(15 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table DOCUMENTATIONS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"VISIT_ID" NUMBER, 
	"DOCUMENTATION_DATE" TIMESTAMP (6), 
	"DIAGNOSIS" VARCHAR2(255 BYTE), 
	"TREATMENT_METHOD" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table MEDICINES
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."MEDICINES" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"NAME" VARCHAR2(100 BYTE), 
	"PRICE" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PATIENTS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."PATIENTS" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"NAME" VARCHAR2(50 BYTE), 
	"LAST_NAME" VARCHAR2(50 BYTE), 
	"GENDER" VARCHAR2(15 BYTE), 
	"ADDRESS" VARCHAR2(100 BYTE), 
	"PHONE_NUMBER" VARCHAR2(15 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PRESCRIPTION_MEDICINES
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"PRESCRIPTION_ID" NUMBER, 
	"MEDICINE_ID" NUMBER, 
	"DOSAGE" VARCHAR2(50 BYTE), 
	"PAYMENT" NUMBER
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PRESCRIPTIONS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"VISIT_ID" NUMBER, 
	"EXPIRATION_DATE" TIMESTAMP (6)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ROOMS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."ROOMS" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"NAME" VARCHAR2(50 BYTE), 
	"WING" VARCHAR2(10 BYTE), 
	"ROOM_FLOOR" VARCHAR2(10 BYTE), 
	"DEPARTMENT" VARCHAR2(100 BYTE), 
	"SUPERVISING_DOCTOR_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table VISITS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."VISITS" 
   (	"ID" NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE , 
	"PATIENT_ID" NUMBER, 
	"DOCTOR_ID" NUMBER, 
	"REASON" VARCHAR2(255 BYTE), 
	"START_DATE" TIMESTAMP (6), 
	"END_DATE" TIMESTAMP (6)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
REM INSERTING into MEDICAL_SYSTEM.DOCTORS
SET DEFINE OFF;
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('1','Dawid','Wójcik','Onkologia dziecięca','575992620');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('2','Robert','Świder','Dermatologia','920378612');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('3','Jarosław','Kuczyński','Alergologia','610975653');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('4','Łukasz','Zuchniak','Psychologia','913816554');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('5','Krystian','Dybiec','Urologia','224917951');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('6','Paweł','Zieliński','Ginekologia','321987654');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('7','Maria','Dąbrowska','Fizjoterapia','789123456');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('8','Piotr','Wiśniewski','Dermatologia','456123789');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('9','Anna','Nowak','Neurologia','987654321');
Insert into MEDICAL_SYSTEM.DOCTORS (ID,NAME,LAST_NAME,SPECIALIZATION,PHONE_NUMBER) values ('10','Jan','Kowalski','Kardiologia','123456789');
REM INSERTING into MEDICAL_SYSTEM.DOCUMENTATIONS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.MEDICINES
SET DEFINE OFF;
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('1','Paracetamol','10');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('2','Ibuprofen','8');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('3','Omeprazol','15');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('4','Amoksycylina','20');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('5','Loratadyna','12');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('6','Pantoprazol','18');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('7','Metformina','25');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('8','Simwastatyna','30');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('9','Ciprofloksacyna','22');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('10','Deksametazon','35');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('11','Aspiryna','7');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('12','Ranitydyna','16');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('13','Ramipryl','28');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('14','Atorwastatyna','32');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('15','Furosemid','19');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('16','Escitalopram','27');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('17','Losartan','24');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('18','Levothyroxine','40');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('19','Gabapentyna','33');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('20','Warfaryna','38');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('21','Tramadol','42');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('22','Flukonazol','29');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('23','Diazepam','21');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('24','Amlodypina','36');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('25','Metronidazol','26');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('26','Tamsulosyna','31');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('27','Sertralina','23');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('28','Fenytoina','37');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('29','Cefalosporyna','34');
Insert into MEDICAL_SYSTEM.MEDICINES (ID,NAME,PRICE) values ('30','Amantadyna','17');
REM INSERTING into MEDICAL_SYSTEM.PATIENTS
SET DEFINE OFF;
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('1','Józef','Kijowski','Mężczyzna','ul. Kwiatowa 1, Warszawa','123456789');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('2','Anna','Nowakowska','Kobieta','ul. Leśna 5, Kraków','987654321');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('3','Paweł','Wiśniewski','Mężczyzna','ul. Słoneczna 10, Wrocław','456123789');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('4','Agnieszka','Dąbrowska','Kobieta','ul. Polna 7, Gdańsk','789456123');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('5','Katarzyna','Lewandowska','Kobieta','ul. Zielona 3, Poznań','654987321');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('6','Andrzej','Wójcik','Mężczyzna','ul. Górska 12, Rzeszów','321654987');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('7','Maria','Kowalczyk','Kobieta','ul. Morska 8, Szczecin','987321654');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('8','Tomasz','Kamiński','Mężczyzna','ul. Parkowa 15, Lublin','741852963');
Insert into MEDICAL_SYSTEM.PATIENTS (ID,NAME,LAST_NAME,GENDER,ADDRESS,PHONE_NUMBER) values ('9','Barbara','Zielińska','Kobieta','ul. Ogrodowa 4, Katowice','369258147');
REM INSERTING into MEDICAL_SYSTEM.PRESCRIPTION_MEDICINES
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.PRESCRIPTIONS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.ROOMS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.VISITS
SET DEFINE OFF;
--------------------------------------------------------
--  DDL for Procedure ADD_DOCUMENTATION
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_DOCUMENTATION" (
    P_VISIT_ID IN NUMBER,
    P_DATE IN TIMESTAMP,
    P_DIAGNOSIS IN VARCHAR2,
    P_TREATMENT_METHOD IN VARCHAR2
)
AS
BEGIN
    INSERT INTO DOCUMENTATIONS (VISIT_ID, DOCUMENTATION_DATE, DIAGNOSIS, TREATMENT_METHOD)
    VALUES (P_VISIT_ID, P_DATE, P_DIAGNOSIS, P_TREATMENT_METHOD);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure ADD_MEDICINE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_MEDICINE" (
    P_NAME IN VARCHAR2,
    P_PRICE IN NUMBER
)
AS
BEGIN
    INSERT INTO MEDICINES (NAME, PRICE)
    VALUES (P_NAME, P_PRICE);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure ADD_PATIENT
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_PATIENT" (
    P_NAME IN VARCHAR2,
    P_LAST_NAME IN VARCHAR2,
    P_GENDER IN VARCHAR2,
    P_ADDRESS IN VARCHAR2,
    P_PHONE_NUMBER IN VARCHAR2
)
AS
BEGIN
    INSERT INTO PATIENTS (NAME, LAST_NAME, GENDER, ADDRESS, PHONE_NUMBER)
    VALUES (P_NAME, P_LAST_NAME, P_GENDER, P_ADDRESS, P_PHONE_NUMBER);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure ADD_PRESCRIPTION
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_PRESCRIPTION" (
    P_VISIT_ID IN NUMBER,
    P_EXPIRATION_DATE IN TIMESTAMP
)
AS
BEGIN
    INSERT INTO PRESCRIPTIONS (VISIT_ID, EXPIRATION_DATE)
    VALUES (P_VISIT_ID, P_EXPIRATION_DATE);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure ADD_PRESCRIPTION_MEDICINE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_PRESCRIPTION_MEDICINE" (
    P_PRESCRIPTION_ID IN NUMBER,
    P_MEDICINE_ID IN NUMBER,
    P_DOSAGE IN VARCHAR2,
    P_PAYMENT IN NUMBER
)
AS
BEGIN
    INSERT INTO PRESCRIPTION_MEDICINES (PRESCRIPTION_ID, MEDICINE_ID, DOSAGE, PAYMENT)
    VALUES (P_PRESCRIPTION_ID, P_MEDICINE_ID, P_DOSAGE, P_PAYMENT);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure ADD_ROOM
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_ROOM" (
    P_NAME IN VARCHAR2,
    P_WING IN VARCHAR2,
    P_FLOOR IN VARCHAR2,
    P_DEPARTMENT IN VARCHAR2,
    P_SUPERVISING_DOCTOR_ID IN NUMBER
)
AS
BEGIN
    INSERT INTO ROOMS (NAME, WING, ROOM_FLOOR, DEPARTMENT, SUPERVISING_DOCTOR_ID)
    VALUES (P_NAME, P_WING, P_FLOOR, P_DEPARTMENT, P_SUPERVISING_DOCTOR_ID);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure ADD_VISIT
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."ADD_VISIT" (
    P_PATIENT_ID IN NUMBER,
    P_DOCTOR_ID IN NUMBER,
    P_REASON IN VARCHAR2,
    P_START_DATE IN TIMESTAMP,
    P_END_DATE IN TIMESTAMP
)
AS
BEGIN
    INSERT INTO VISITS (PATIENT_ID, DOCTOR_ID, REASON, START_DATE, END_DATE)
    VALUES (P_PATIENT_ID, P_DOCTOR_ID, P_REASON, P_START_DATE, P_END_DATE);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END;


/
--------------------------------------------------------
--  DDL for Procedure DELETE_DOCUMENTATION
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."DELETE_DOCUMENTATION" (
    P_ID IN NUMBER
)
AS
BEGIN
    DELETE FROM DOCUMENTATIONS WHERE ID = P_ID;
END DELETE_DOCUMENTATION;


/
--------------------------------------------------------
--  DDL for Procedure DELETE_PATIENT
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."DELETE_PATIENT" (
    P_ID IN NUMBER
)
AS
BEGIN
    DELETE FROM PATIENTS WHERE ID = P_ID;
END DELETE_PATIENT;


/
--------------------------------------------------------
--  DDL for Procedure DELETE_PRESCRIPTION
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."DELETE_PRESCRIPTION" (
    P_ID IN NUMBER
)
AS
BEGIN
    DELETE FROM PRESCRIPTIONS WHERE ID = P_ID;
END DELETE_PRESCRIPTION;


/
--------------------------------------------------------
--  DDL for Procedure DELETE_PRESCRIPTION_MEDICINE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."DELETE_PRESCRIPTION_MEDICINE" (
    P_ID IN NUMBER
)
AS
BEGIN
    DELETE FROM PRESCRIPTION_MEDICINES WHERE ID = P_ID;
END DELETE_PRESCRIPTION_MEDICINE;


/
--------------------------------------------------------
--  DDL for Procedure DELETE_ROOM
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."DELETE_ROOM" (
    P_ID IN NUMBER
)
AS
BEGIN
    DELETE FROM ROOMS WHERE ID = P_ID;
END DELETE_ROOM;


/
--------------------------------------------------------
--  DDL for Procedure UPDATE_DOCUMENTATION
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."UPDATE_DOCUMENTATION" (
    P_ID IN NUMBER,
    P_VISIT_ID IN NUMBER,
    P_DATE IN TIMESTAMP,
    P_DIAGNOSIS IN VARCHAR2,
    P_TREATMENT_METHOD IN VARCHAR2
)
AS
BEGIN
    UPDATE DOCUMENTATIONS
    SET VISIT_ID = P_VISIT_ID, DOCUMENTATION_DATE = P_DATE, DIAGNOSIS = P_DIAGNOSIS, TREATMENT_METHOD = P_TREATMENT_METHOD
    WHERE ID = P_ID;
END UPDATE_DOCUMENTATION;


/
--------------------------------------------------------
--  DDL for Procedure UPDATE_PATIENT
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."UPDATE_PATIENT" (
    P_ID IN NUMBER,
    P_NAME IN VARCHAR2,
    P_LAST_NAME IN VARCHAR2,
    P_GENDER IN VARCHAR2,
    P_ADDRESS IN VARCHAR2,
    P_PHONE_NUMBER IN VARCHAR2
)
AS
BEGIN
    UPDATE PATIENTS
    SET NAME = P_NAME, LAST_NAME = P_LAST_NAME, GENDER = P_GENDER, ADDRESS = P_ADDRESS, PHONE_NUMBER = P_PHONE_NUMBER
    WHERE ID = P_ID;
END UPDATE_PATIENT;


/
--------------------------------------------------------
--  DDL for Procedure UPDATE_PRESCRIPTION
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."UPDATE_PRESCRIPTION" (
    P_ID IN NUMBER,
    P_VISIT_ID IN NUMBER,
    P_EXPIRATION_DATE IN TIMESTAMP
)
AS
BEGIN
    UPDATE PRESCRIPTIONS
    SET VISIT_ID = P_VISIT_ID, EXPIRATION_DATE = P_EXPIRATION_DATE
    WHERE ID = P_ID;
END UPDATE_PRESCRIPTION;


/
--------------------------------------------------------
--  DDL for Procedure UPDATE_PRESCRIPTION_MEDICINE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."UPDATE_PRESCRIPTION_MEDICINE" (
    P_ID IN NUMBER,
    P_DOSAGE IN VARCHAR2,
    P_PAYMENT IN NUMBER
)
AS
BEGIN
    UPDATE PRESCRIPTION_MEDICINES
    SET DOSAGE = P_DOSAGE, PAYMENT = P_PAYMENT
    WHERE ID = P_ID;
END UPDATE_PRESCRIPTION_MEDICINE;


/
--------------------------------------------------------
--  DDL for Procedure UPDATE_ROOM
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "MEDICAL_SYSTEM"."UPDATE_ROOM" (
    P_ID IN NUMBER,
    P_NAME IN VARCHAR2,
    P_WING IN VARCHAR2,
    P_FLOOR IN VARCHAR2,
    P_DEPARTMENT IN VARCHAR2,
    P_SUPERVISING_DOCTOR_ID IN NUMBER
)
AS
BEGIN
    UPDATE ROOMS
    SET NAME = P_NAME, WING = P_WING, ROOM_FLOOR = P_FLOOR, DEPARTMENT = P_DEPARTMENT, SUPERVISING_DOCTOR_ID = P_SUPERVISING_DOCTOR_ID
    WHERE ID = P_ID;
END UPDATE_ROOM;


/
--------------------------------------------------------
--  DDL for Function CALCULATE_AVERAGE_MEDICINE_PRICE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."CALCULATE_AVERAGE_MEDICINE_PRICE" 
RETURN SYS_REFCURSOR
AS
    average_price_cursor SYS_REFCURSOR;
BEGIN
    OPEN average_price_cursor FOR
        SELECT AVG(PRICE) AS AVERAGE_PRICE FROM MEDICINES;
    RETURN average_price_cursor;
END CALCULATE_AVERAGE_MEDICINE_PRICE;


/
--------------------------------------------------------
--  DDL for Function GENERATE_DOCTOR_PATIENT_COUNT_REPORT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GENERATE_DOCTOR_PATIENT_COUNT_REPORT" 
RETURN SYS_REFCURSOR
AS
    doctor_patient_count_cursor SYS_REFCURSOR;
BEGIN
    OPEN doctor_patient_count_cursor FOR
        SELECT D.*, COUNT(V.PATIENT_ID) AS PATIENT_COUNT
        FROM DOCTORS D
        LEFT JOIN VISITS V ON D.ID = V.DOCTOR_ID
        GROUP BY D.ID, D.NAME, D.LAST_NAME, D.SPECIALIZATION, D.PHONE_NUMBER;
    RETURN doctor_patient_count_cursor;
END GENERATE_DOCTOR_PATIENT_COUNT_REPORT;


/
--------------------------------------------------------
--  DDL for Function GENERATE_TOP_DIAGNOSIS_REPORT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GENERATE_TOP_DIAGNOSIS_REPORT" (
    P_TOP_COUNT IN NUMBER
)
RETURN SYS_REFCURSOR
AS
    top_diagnosis_cursor SYS_REFCURSOR;
BEGIN
    OPEN top_diagnosis_cursor FOR
        SELECT DIAGNOSIS, COUNT(*) AS DIAGNOSIS_COUNT
        FROM DOCUMENTATIONS
        GROUP BY DIAGNOSIS
        ORDER BY DIAGNOSIS_COUNT DESC
        FETCH FIRST P_TOP_COUNT ROWS ONLY;
    RETURN top_diagnosis_cursor;
END GENERATE_TOP_DIAGNOSIS_REPORT;


/
--------------------------------------------------------
--  DDL for Function GENERATE_VISIT_COUNT_BY_SPECIALIZATION_REPORT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GENERATE_VISIT_COUNT_BY_SPECIALIZATION_REPORT" 
RETURN SYS_REFCURSOR
AS
    visit_count_by_specialization_cursor SYS_REFCURSOR;
BEGIN
    OPEN visit_count_by_specialization_cursor FOR
        SELECT D.SPECIALIZATION, COUNT(V.ID) AS VISIT_COUNT
        FROM DOCTORS D
        LEFT JOIN VISITS V ON D.ID = V.DOCTOR_ID
        GROUP BY D.SPECIALIZATION;
    RETURN visit_count_by_specialization_cursor;
END GENERATE_VISIT_COUNT_BY_SPECIALIZATION_REPORT;


/
--------------------------------------------------------
--  DDL for Function GET_ALL_DOCTORS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_ALL_DOCTORS" 
RETURN SYS_REFCURSOR
AS
    doctors_cursor SYS_REFCURSOR;
BEGIN
    OPEN doctors_cursor FOR
        SELECT * FROM doctors;
    RETURN doctors_cursor;
END GET_ALL_DOCTORS;


/
--------------------------------------------------------
--  DDL for Function GET_ALL_DOCUMENTATIONS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_ALL_DOCUMENTATIONS" 
RETURN SYS_REFCURSOR
AS
    documentation_cursor SYS_REFCURSOR;
BEGIN
    OPEN documentation_cursor FOR
        SELECT * FROM DOCUMENTATIONS;
    RETURN documentation_cursor;
END GET_ALL_DOCUMENTATIONS;


/
--------------------------------------------------------
--  DDL for Function GET_ALL_PATIENTS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_ALL_PATIENTS" 
RETURN SYS_REFCURSOR
AS
    patients_cursor SYS_REFCURSOR;
BEGIN
    OPEN patients_cursor FOR
        SELECT * FROM PATIENTS;
    RETURN patients_cursor;
END GET_ALL_PATIENTS;


/
--------------------------------------------------------
--  DDL for Function GET_ALL_PRESCRIPTIONS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_ALL_PRESCRIPTIONS" 
RETURN SYS_REFCURSOR
AS
    prescriptions_cursor SYS_REFCURSOR;
BEGIN
    OPEN prescriptions_cursor FOR
        SELECT * FROM PRESCRIPTIONS;
    RETURN prescriptions_cursor;
END GET_ALL_PRESCRIPTIONS;


/
--------------------------------------------------------
--  DDL for Function GET_ALL_ROOMS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_ALL_ROOMS" 
RETURN SYS_REFCURSOR
AS
    rooms_cursor SYS_REFCURSOR;
BEGIN
    OPEN rooms_cursor FOR
        SELECT * FROM ROOMS;
    RETURN rooms_cursor;
END GET_ALL_ROOMS;


/
--------------------------------------------------------
--  DDL for Function GET_ALL_VISITS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_ALL_VISITS" 
RETURN SYS_REFCURSOR
AS
    visits_cursor SYS_REFCURSOR;
BEGIN
    OPEN visits_cursor FOR
        SELECT * FROM VISITS;
    RETURN visits_cursor;
END GET_ALL_VISITS;


/
--------------------------------------------------------
--  DDL for Function GET_PRESCRIPTION_MEDICINES
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."GET_PRESCRIPTION_MEDICINES" (
    P_PRESCRIPTION_ID IN NUMBER
)
RETURN SYS_REFCURSOR
AS
    prescription_medicines_cursor SYS_REFCURSOR;
BEGIN
    OPEN prescription_medicines_cursor FOR
        SELECT PM.*, M.NAME AS MEDICINE_NAME
        FROM PRESCRIPTION_MEDICINES PM
        INNER JOIN MEDICINES M ON PM.MEDICINE_ID = M.ID
        WHERE PM.PRESCRIPTION_ID = P_PRESCRIPTION_ID;
    RETURN prescription_medicines_cursor;
END GET_PRESCRIPTION_MEDICINES;


/
--------------------------------------------------------
--  DDL for Function SEARCH_DOCTORS_BY_SPECIALIZATION
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."SEARCH_DOCTORS_BY_SPECIALIZATION" (
    P_SPECIALIZATION IN VARCHAR2
)
RETURN SYS_REFCURSOR
AS
    doctors_by_specialization_cursor SYS_REFCURSOR;
BEGIN
    OPEN doctors_by_specialization_cursor FOR
        SELECT * FROM DOCTORS WHERE SPECIALIZATION = P_SPECIALIZATION;
    RETURN doctors_by_specialization_cursor;
END SEARCH_DOCTORS_BY_SPECIALIZATION;


/
--------------------------------------------------------
--  DDL for Function SEARCH_EXPENSIVE_MEDICINES
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."SEARCH_EXPENSIVE_MEDICINES" RETURN SYS_REFCURSOR
IS
    AVG_PRICE NUMBER;
    CUR_MEDICINES SYS_REFCURSOR;
BEGIN
    OPEN CUR_MEDICINES FOR SELECT * FROM MEDICINES WHERE PRICE > (SELECT AVG(PRICE) FROM MEDICINES);
    RETURN CUR_MEDICINES;
END SEARCH_EXPENSIVE_MEDICINES;

/
--------------------------------------------------------
--  DDL for Function SEARCH_PATIENTS_BY_VISIT_DATE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."SEARCH_PATIENTS_BY_VISIT_DATE" (
    P_VISIT_DATE IN DATE
)
RETURN SYS_REFCURSOR
AS
    patients_by_visit_date_cursor SYS_REFCURSOR;
BEGIN
    OPEN patients_by_visit_date_cursor FOR
        SELECT DISTINCT P.*
        FROM PATIENTS P
        INNER JOIN VISITS V ON P.ID = V.PATIENT_ID
        WHERE TRUNC(V.START_DATE) = TRUNC(P_VISIT_DATE);
    RETURN patients_by_visit_date_cursor;
END SEARCH_PATIENTS_BY_VISIT_DATE;


/
--------------------------------------------------------
--  DDL for Function SEARCH_TOP_PRESCRIBED_MEDICINES_BY_DOCTOR
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."SEARCH_TOP_PRESCRIBED_MEDICINES_BY_DOCTOR" (
    P_DOCTOR_ID IN NUMBER,
    P_TOP_COUNT IN NUMBER
)
RETURN SYS_REFCURSOR
AS
    top_prescribed_medicines_cursor SYS_REFCURSOR;
BEGIN
    OPEN top_prescribed_medicines_cursor FOR
        SELECT *
        FROM (
            SELECT M.NAME AS MEDICINE_NAME, COUNT(PM.PRESCRIPTION_ID) AS PRESCRIPTION_COUNT
            FROM MEDICINES M
            INNER JOIN PRESCRIPTION_MEDICINES PM ON M.ID = PM.MEDICINE_ID
            INNER JOIN PRESCRIPTIONS P ON PM.PRESCRIPTION_ID = P.ID
            INNER JOIN VISITS V ON P.VISIT_ID = V.ID
            WHERE V.DOCTOR_ID = P_DOCTOR_ID
            GROUP BY M.ID, M.NAME
            ORDER BY PRESCRIPTION_COUNT DESC
        )
        WHERE ROWNUM <= P_TOP_COUNT;
    RETURN top_prescribed_medicines_cursor;
END SEARCH_TOP_PRESCRIBED_MEDICINES_BY_DOCTOR;


/
--------------------------------------------------------
--  DDL for Function SEARCH_VISITS_BY_PATIENT_LAST_NAME
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "MEDICAL_SYSTEM"."SEARCH_VISITS_BY_PATIENT_LAST_NAME" (
    P_LAST_NAME IN VARCHAR2
)
RETURN SYS_REFCURSOR
AS
    visits_by_patient_last_name_cursor SYS_REFCURSOR;
BEGIN
    OPEN visits_by_patient_last_name_cursor FOR
        SELECT V.*, P.NAME AS PATIENT_NAME, P.LAST_NAME AS PATIENT_LAST_NAME, D.NAME AS DOCTOR_NAME, D.LAST_NAME AS DOCTOR_LAST_NAME
        FROM VISITS V
        INNER JOIN PATIENTS P ON V.PATIENT_ID = P.ID
        INNER JOIN DOCTORS D ON V.DOCTOR_ID = D.ID
        WHERE P.LAST_NAME LIKE '%' || P_LAST_NAME || '%';
    RETURN visits_by_patient_last_name_cursor;
END SEARCH_VISITS_BY_PATIENT_LAST_NAME;


/
--------------------------------------------------------
--  Constraints for Table PATIENTS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PATIENTS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."PATIENTS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PRESCRIPTION_MEDICINES
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table DOCTORS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."DOCTORS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."DOCTORS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table ROOMS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."ROOMS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."ROOMS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table DOCUMENTATIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table VISITS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PRESCRIPTIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table MEDICINES
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."MEDICINES" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "MEDICAL_SYSTEM"."MEDICINES" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table DOCUMENTATIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" ADD CONSTRAINT "FK_DOCUMENTATIONS_VISIT_ID" FOREIGN KEY ("VISIT_ID")
	  REFERENCES "MEDICAL_SYSTEM"."VISITS" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRESCRIPTION_MEDICINES
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ADD CONSTRAINT "FK_PRESCRIPTION_MEDICINES_PRESCRIPTION_ID" FOREIGN KEY ("PRESCRIPTION_ID")
	  REFERENCES "MEDICAL_SYSTEM"."PRESCRIPTIONS" ("ID") ENABLE;
  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ADD CONSTRAINT "FK_PRESCRIPTION_MEDICINES_MEDICINE_ID" FOREIGN KEY ("MEDICINE_ID")
	  REFERENCES "MEDICAL_SYSTEM"."MEDICINES" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRESCRIPTIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" ADD CONSTRAINT "FK_PRESCRIPTIONS_VISIT_ID" FOREIGN KEY ("VISIT_ID")
	  REFERENCES "MEDICAL_SYSTEM"."VISITS" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ROOMS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."ROOMS" ADD CONSTRAINT "FK_ROOMS_DOCTOR_ID" FOREIGN KEY ("SUPERVISING_DOCTOR_ID")
	  REFERENCES "MEDICAL_SYSTEM"."DOCTORS" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table VISITS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" ADD CONSTRAINT "FK_VISITS_PATIENT_ID" FOREIGN KEY ("PATIENT_ID")
	  REFERENCES "MEDICAL_SYSTEM"."PATIENTS" ("ID") ENABLE;
  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" ADD CONSTRAINT "FK_VISITS_DOCTOR_ID" FOREIGN KEY ("DOCTOR_ID")
	  REFERENCES "MEDICAL_SYSTEM"."DOCTORS" ("ID") ENABLE;
