use dbtecweb;

SELECT * FROM MORRO 
	INNER JOIN CENDI on CENDI_idCENDI=idCENDI 
    INNER JOIN CITAS on CITAS_idCITAS=idCITAS 
    INNER JOIN ENTREVISTA on ENTREVISTA_idENTREVISTA=idENTREVISTA
    INNER JOIN GRUPO on GRUPO_idGRUPO=idGRUPO
    INNER JOIN (DERECHOHABIENTE 
					INNER JOIN OCUPACION on OCUPACION_ID=ID
                    INNER JOIN ADSCRIPCION on idADS=ADSCRIPCION_idADS
                    INNER JOIN HORARIO on idHORARIO=HORARIO_idHORARIO) on DERECHOHABIENTE.MORRO_Boleta=FOLIO
    INNER JOIN CONYUGE as CONYUGUE on CONYUGUE.MORRO_Boleta=FOLIO
;