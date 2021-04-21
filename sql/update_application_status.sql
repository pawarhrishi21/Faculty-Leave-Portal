CREATE OR REPLACE FUNCTION updateApplicationStatus(	
	IN application_id INTEGER,
	IN position_of_updater VARCHAR,
	IN type_of_update VARCHAR
) 
RETURNS
VOID
AS $$
#variable_conflict use_column

DECLARE
new_status VARCHAR;

BEGIN
if type_of_update='accept' then
	if position_of_updater='HOD' then
		new_status='Dean FA';
	elsif position_of_updater='Dean FA' or position_of_updater='Director' then
		new_status:='Approved';
	end if;
	
elsif type_of_update='reject' then
	new_status:='Rejected';
	
elseif type_of_update='return' then
	new_status:=CONCAT('Returned by ',position_of_updater);
end if;

UPDATE applications
SET status=new_status
WHERE appid=application_id;

END;
$$ LANGUAGE plpgsql;