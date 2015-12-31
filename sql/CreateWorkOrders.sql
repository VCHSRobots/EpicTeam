
Use EpicTeam;

drop table WorkOrders; 
create Table WorkOrders (
   WorkOrderID int AUTO_INCREMENT PRIMARY KEY,
   WorkOrderTitle varchar(40) NOT NULL UNIQUE,
   Description text,
   DateRequested DATE,
   DateNeeded date,
   Priority varchar(10),
   DayEstimate int,
   Revision varchar(1),
   Requestor varchar(80),
   RequestingIPTLeadApproval boolean,
   AssignedIPTLeadApproval boolean,
   Project varchar(100),
   RequestingIPTGroup varchar(80),
   ReceivingIPTGroup varchar(80),
   ProjectOfficeApproval boolean,
   ReviewedBy varchar(80),
   AssignedTo varchar(80),
   Completed boolean,
   CompletedOn date ); 

drop table WorkOrderTasks; 
create Table WorkOrderTasks (
   TaskID	int AUTO_INCREMENT PRIMARY KEY,
   WorkOrderID int,
   Quantity int,
   Description varchar(150),
   UnitPrice decimal(4,2)
 
);

drop table Prerequisites; 
create Table Prerequisites (
   PrereqID	int AUTO_INCREMENT PRIMARY KEY,
   PrevWorkOrderID int,
   WorkOrderID int
); 

drop table RelatedFiles;
create Table RelatedFiles (
   FileID	int AUTO_INCREMENT PRIMARY KEY,
   WorkOrderID int,
   FilePath varchar(200)
   );

/*Additional info created whenever a student must edit work order after it has been approved*/
drop table AppendedData;
create Table AppendedData(
	AppendedDataID int AUTO_INCREMENT PRIMARY KEY,
    WorkOrderID int,
    UserID int,
	AppendNumber int #This is incremented for each work order separately
    );

drop table WorkOrderStudent;
create Table WorkOrderStudent(
	WorkOrderStudentID int AUTO_INCREMENT PRIMARY KEY,
    WorkOrderID int,
    UserID int
	);    
drop table Project;
create Table Project(
	ProjectID int AUTO_INCREMENT PRIMARY KEY,
    ProjectName varchar(30),
    ProjectDescription varchar(500)
    );
drop table IPTGroup;
create Table IPTGroup(
	IPTGroupID int AUTO_INCREMENT PRIMARY KEY,
    IPTGroupName varchar(30),
    IPTleadUserID int
    );
    
