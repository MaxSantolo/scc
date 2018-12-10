SELECT rubr_titolo, rubr_rasol1, rubr_rasol2, rubr_indiri, rubr_cap, rubr_comune, rubr_provin, rubr_telefo, rubr_telcel, rubr_fax, rubr_email, rubr_web, rubr_pariva, rubr_codfis, dbo.loc_rubrdett.*, REPLACE(REPLACE(cast(rubr_note as nvarchar(4000)), CHAR(13), '|'), CHAR(10), '|') as note FROM dbo.std_rubrica, dbo.loc_rubrdett where dbo.std_rubrica.rubr_codice = dbo.loc_rubrdett.rubr_codice order by dbo.std_rubrica.rubr_codice