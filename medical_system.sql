--------------------------------------------------------
--  File created - sobota-kwietnia-27-2024   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table DOCTORS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."DOCTORS" 
   (	"ID" NUMBER(*,0), 
	"NAME" VARCHAR2(50 BYTE), 
	"LAST_NAME" VARCHAR2(50 BYTE), 
	"SPECIALIZATION" VARCHAR2(100 BYTE), 
	"PHONE_NUMBER" VARCHAR2(15 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table DOCUMENTATIONS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" 
   (	"ID" NUMBER(*,0), 
	"VISIT_ID" NUMBER(*,0), 
	"DOCUMENTATION_DATE" TIMESTAMP (6), 
	"DIAGNOSIS" VARCHAR2(255 BYTE), 
	"TREATMENT_METHOD" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table VISITS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."VISITS" 
   (	"ID" NUMBER(*,0), 
	"PATIENT_ID" NUMBER(*,0), 
	"DOCTOR_ID" NUMBER(*,0), 
	"REASON" VARCHAR2(255 BYTE), 
	"START_DATE" TIMESTAMP (6), 
	"END_DATE" TIMESTAMP (6)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ROOMS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."ROOMS" 
   (	"ID" NUMBER(*,0), 
	"NAME" VARCHAR2(50 BYTE), 
	"WING" VARCHAR2(10 BYTE), 
	"ROOM_FLOOR" VARCHAR2(10 BYTE), 
	"DEPARTMENT" VARCHAR2(100 BYTE), 
	"SUPERVISING_DOCTOR_ID" NUMBER(*,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PRESCRIPTION_MEDICINES
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" 
   (	"PRESCRIPTION_ID" NUMBER(*,0), 
	"MEDICINE_ID" NUMBER(*,0), 
	"DOSAGE" VARCHAR2(50 BYTE), 
	"PAYMENT" NUMBER(*,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PATIENTS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."PATIENTS" 
   (	"ID" NUMBER(*,0), 
	"NAME" VARCHAR2(50 BYTE), 
	"LAST_NAME" VARCHAR2(50 BYTE), 
	"GENDER" VARCHAR2(10 BYTE), 
	"ADDRESS" VARCHAR2(100 BYTE), 
	"PHONE_NUMBER" VARCHAR2(15 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table MEDICINES
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."MEDICINES" 
   (	"ID" NUMBER(*,0), 
	"NAME" VARCHAR2(100 BYTE), 
	"PRICE" NUMBER(*,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PRESCRIPTIONS
--------------------------------------------------------

  CREATE TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" 
   (	"ID" NUMBER(*,0), 
	"VISIT_ID" NUMBER(*,0), 
	"EXPIRATION_DATE" TIMESTAMP (6)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
REM INSERTING into MEDICAL_SYSTEM.DOCTORS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.DOCUMENTATIONS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.VISITS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.ROOMS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.PRESCRIPTION_MEDICINES
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.PATIENTS
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.MEDICINES
SET DEFINE OFF;
REM INSERTING into MEDICAL_SYSTEM.PRESCRIPTIONS
SET DEFINE OFF;
--------------------------------------------------------
--  DDL for Index SYS_C008315
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008315" ON "MEDICAL_SYSTEM"."DOCTORS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008321
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008321" ON "MEDICAL_SYSTEM"."DOCUMENTATIONS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008318
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008318" ON "MEDICAL_SYSTEM"."VISITS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008316
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008316" ON "MEDICAL_SYSTEM"."ROOMS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008326
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008326" ON "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ("PRESCRIPTION_ID", "MEDICINE_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008314
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008314" ON "MEDICAL_SYSTEM"."PATIENTS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008325
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008325" ON "MEDICAL_SYSTEM"."MEDICINES" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C008323
--------------------------------------------------------

  CREATE UNIQUE INDEX "MEDICAL_SYSTEM"."SYS_C008323" ON "MEDICAL_SYSTEM"."PRESCRIPTIONS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  Constraints for Table DOCTORS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."DOCTORS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table DOCUMENTATIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table VISITS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table ROOMS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."ROOMS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PRESCRIPTION_MEDICINES
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ADD PRIMARY KEY ("PRESCRIPTION_ID", "MEDICINE_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PATIENTS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PATIENTS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table MEDICINES
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."MEDICINES" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PRESCRIPTIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table DOCUMENTATIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."DOCUMENTATIONS" ADD FOREIGN KEY ("VISIT_ID")
	  REFERENCES "MEDICAL_SYSTEM"."VISITS" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table VISITS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" ADD FOREIGN KEY ("PATIENT_ID")
	  REFERENCES "MEDICAL_SYSTEM"."PATIENTS" ("ID") ENABLE;
  ALTER TABLE "MEDICAL_SYSTEM"."VISITS" ADD FOREIGN KEY ("DOCTOR_ID")
	  REFERENCES "MEDICAL_SYSTEM"."DOCTORS" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ROOMS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."ROOMS" ADD FOREIGN KEY ("SUPERVISING_DOCTOR_ID")
	  REFERENCES "MEDICAL_SYSTEM"."DOCTORS" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRESCRIPTION_MEDICINES
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ADD FOREIGN KEY ("PRESCRIPTION_ID")
	  REFERENCES "MEDICAL_SYSTEM"."PRESCRIPTIONS" ("ID") ENABLE;
  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTION_MEDICINES" ADD FOREIGN KEY ("MEDICINE_ID")
	  REFERENCES "MEDICAL_SYSTEM"."MEDICINES" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRESCRIPTIONS
--------------------------------------------------------

  ALTER TABLE "MEDICAL_SYSTEM"."PRESCRIPTIONS" ADD FOREIGN KEY ("VISIT_ID")
	  REFERENCES "MEDICAL_SYSTEM"."VISITS" ("ID") ENABLE;
