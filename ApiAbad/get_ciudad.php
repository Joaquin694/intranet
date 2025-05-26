<?php
// El array JSON
$jsonData = '[
    {
      "id": "010101",
      "text": "Amazonas - Chachapoyas - Chachapoyas"
    },
    {
      "id": "010102",
      "text": "Amazonas - Chachapoyas - Asunción"
    },
    {
      "id": "010103",
      "text": "Amazonas - Chachapoyas - Balsas"
    },
    {
      "id": "010104",
      "text": "Amazonas - Chachapoyas - Cheto"
    },
    {
      "id": "010105",
      "text": "Amazonas - Chachapoyas - Chiliquin"
    },
    {
      "id": "010106",
      "text": "Amazonas - Chachapoyas - Chuquibamba"
    },
    {
      "id": "010107",
      "text": "Amazonas - Chachapoyas - Granada"
    },
    {
      "id": "010108",
      "text": "Amazonas - Chachapoyas - Huancas"
    },
    {
      "id": "010109",
      "text": "Amazonas - Chachapoyas - La Jalca"
    },
    {
      "id": "010110",
      "text": "Amazonas - Chachapoyas - Leimebamba"
    },
    {
      "id": "010111",
      "text": "Amazonas - Chachapoyas - Levanto"
    },
    {
      "id": "010112",
      "text": "Amazonas - Chachapoyas - Magdalena"
    },
    {
      "id": "010113",
      "text": "Amazonas - Chachapoyas - Mariscal Castilla"
    },
    {
      "id": "010114",
      "text": "Amazonas - Chachapoyas - Molinopampa"
    },
    {
      "id": "010115",
      "text": "Amazonas - Chachapoyas - Montevideo"
    },
    {
      "id": "010116",
      "text": "Amazonas - Chachapoyas - Olleros"
    },
    {
      "id": "010117",
      "text": "Amazonas - Chachapoyas - Quinjalca"
    },
    {
      "id": "010118",
      "text": "Amazonas - Chachapoyas - San Francisco de Daguas"
    },
    {
      "id": "010119",
      "text": "Amazonas - Chachapoyas - San Isidro de Maino"
    },
    {
      "id": "010120",
      "text": "Amazonas - Chachapoyas - Soloco"
    },
    {
      "id": "010121",
      "text": "Amazonas - Chachapoyas - Sonche"
    },
    {
      "id": "010201",
      "text": "Amazonas - Bagua - Bagua"
    },
    {
      "id": "010202",
      "text": "Amazonas - Bagua - Aramango"
    },
    {
      "id": "010203",
      "text": "Amazonas - Bagua - Copallin"
    },
    {
      "id": "010204",
      "text": "Amazonas - Bagua - El Parco"
    },
    {
      "id": "010205",
      "text": "Amazonas - Bagua - Imaza"
    },
    {
      "id": "010206",
      "text": "Amazonas - Bagua - La Peca"
    },
    {
      "id": "010301",
      "text": "Amazonas - Bongará - Jumbilla"
    },
    {
      "id": "010302",
      "text": "Amazonas - Bongará - Chisquilla"
    },
    {
      "id": "010303",
      "text": "Amazonas - Bongará - Churuja"
    },
    {
      "id": "010304",
      "text": "Amazonas - Bongará - Corosha"
    },
    {
      "id": "010305",
      "text": "Amazonas - Bongará - Cuispes"
    },
    {
      "id": "010306",
      "text": "Amazonas - Bongará - Florida"
    },
    {
      "id": "010307",
      "text": "Amazonas - Bongará - Jazan"
    },
    {
      "id": "010308",
      "text": "Amazonas - Bongará - Recta"
    },
    {
      "id": "010309",
      "text": "Amazonas - Bongará - San Carlos"
    },
    {
      "id": "010310",
      "text": "Amazonas - Bongará - Shipasbamba"
    },
    {
      "id": "010311",
      "text": "Amazonas - Bongará - Valera"
    },
    {
      "id": "010312",
      "text": "Amazonas - Bongará - Yambrasbamba"
    },
    {
      "id": "010401",
      "text": "Amazonas - Condorcanqui - Nieva"
    },
    {
      "id": "010402",
      "text": "Amazonas - Condorcanqui - El Cenepa"
    },
    {
      "id": "010403",
      "text": "Amazonas - Condorcanqui - Río Santiago"
    },
    {
      "id": "010501",
      "text": "Amazonas - Luya - Lamud"
    },
    {
      "id": "010502",
      "text": "Amazonas - Luya - Camporredondo"
    },
    {
      "id": "010503",
      "text": "Amazonas - Luya - Cocabamba"
    },
    {
      "id": "010504",
      "text": "Amazonas - Luya - Colcamar"
    },
    {
      "id": "010505",
      "text": "Amazonas - Luya - Conila"
    },
    {
      "id": "010506",
      "text": "Amazonas - Luya - Inguilpata"
    },
    {
      "id": "010507",
      "text": "Amazonas - Luya - Longuita"
    },
    {
      "id": "010508",
      "text": "Amazonas - Luya - Lonya Chico"
    },
    {
      "id": "010509",
      "text": "Amazonas - Luya - Luya"
    },
    {
      "id": "010510",
      "text": "Amazonas - Luya - Luya Viejo"
    },
    {
      "id": "010511",
      "text": "Amazonas - Luya - María"
    },
    {
      "id": "010512",
      "text": "Amazonas - Luya - Ocalli"
    },
    {
      "id": "010513",
      "text": "Amazonas - Luya - Ocumal"
    },
    {
      "id": "010514",
      "text": "Amazonas - Luya - Pisuquia"
    },
    {
      "id": "010515",
      "text": "Amazonas - Luya - Providencia"
    },
    {
      "id": "010516",
      "text": "Amazonas - Luya - San Cristóbal"
    },
    {
      "id": "010517",
      "text": "Amazonas - Luya - San Francisco de Yeso"
    },
    {
      "id": "010518",
      "text": "Amazonas - Luya - San Jerónimo"
    },
    {
      "id": "010519",
      "text": "Amazonas - Luya - San Juan de Lopecancha"
    },
    {
      "id": "010520",
      "text": "Amazonas - Luya - Santa Catalina"
    },
    {
      "id": "010521",
      "text": "Amazonas - Luya - Santo Tomas"
    },
    {
      "id": "010522",
      "text": "Amazonas - Luya - Tingo"
    },
    {
      "id": "010523",
      "text": "Amazonas - Luya - Trita"
    },
    {
      "id": "010601",
      "text": "Amazonas - Rodríguez de Mendoza - San Nicolás"
    },
    {
      "id": "010602",
      "text": "Amazonas - Rodríguez de Mendoza - Chirimoto"
    },
    {
      "id": "010603",
      "text": "Amazonas - Rodríguez de Mendoza - Cochamal"
    },
    {
      "id": "010604",
      "text": "Amazonas - Rodríguez de Mendoza - Huambo"
    },
    {
      "id": "010605",
      "text": "Amazonas - Rodríguez de Mendoza - Limabamba"
    },
    {
      "id": "010606",
      "text": "Amazonas - Rodríguez de Mendoza - Longar"
    },
    {
      "id": "010607",
      "text": "Amazonas - Rodríguez de Mendoza - Mariscal Benavides"
    },
    {
      "id": "010608",
      "text": "Amazonas - Rodríguez de Mendoza - Milpuc"
    },
    {
      "id": "010609",
      "text": "Amazonas - Rodríguez de Mendoza - Omia"
    },
    {
      "id": "010610",
      "text": "Amazonas - Rodríguez de Mendoza - Santa Rosa"
    },
    {
      "id": "010611",
      "text": "Amazonas - Rodríguez de Mendoza - Totora"
    },
    {
      "id": "010612",
      "text": "Amazonas - Rodríguez de Mendoza - Vista Alegre"
    },
    {
      "id": "010701",
      "text": "Amazonas - Utcubamba - Bagua Grande"
    },
    {
      "id": "010702",
      "text": "Amazonas - Utcubamba - Cajaruro"
    },
    {
      "id": "010703",
      "text": "Amazonas - Utcubamba - Cumba"
    },
    {
      "id": "010704",
      "text": "Amazonas - Utcubamba - El Milagro"
    },
    {
      "id": "010705",
      "text": "Amazonas - Utcubamba - Jamalca"
    },
    {
      "id": "010706",
      "text": "Amazonas - Utcubamba - Lonya Grande"
    },
    {
      "id": "010707",
      "text": "Amazonas - Utcubamba - Yamon"
    },
    {
      "id": "020101",
      "text": "Áncash - Huaraz - Huaraz"
    },
    {
      "id": "020102",
      "text": "Áncash - Huaraz - Cochabamba"
    },
    {
      "id": "020103",
      "text": "Áncash - Huaraz - Colcabamba"
    },
    {
      "id": "020104",
      "text": "Áncash - Huaraz - Huanchay"
    },
    {
      "id": "020105",
      "text": "Áncash - Huaraz - Independencia"
    },
    {
      "id": "020106",
      "text": "Áncash - Huaraz - Jangas"
    },
    {
      "id": "020107",
      "text": "Áncash - Huaraz - La Libertad"
    },
    {
      "id": "020108",
      "text": "Áncash - Huaraz - Olleros"
    },
    {
      "id": "020109",
      "text": "Áncash - Huaraz - Pampas Grande"
    },
    {
      "id": "020110",
      "text": "Áncash - Huaraz - Pariacoto"
    },
    {
      "id": "020111",
      "text": "Áncash - Huaraz - Pira"
    },
    {
      "id": "020112",
      "text": "Áncash - Huaraz - Tarica"
    },
    {
      "id": "020201",
      "text": "Áncash - Aija - Aija"
    },
    {
      "id": "020202",
      "text": "Áncash - Aija - Coris"
    },
    {
      "id": "020203",
      "text": "Áncash - Aija - Huacllan"
    },
    {
      "id": "020204",
      "text": "Áncash - Aija - La Merced"
    },
    {
      "id": "020205",
      "text": "Áncash - Aija - Succha"
    },
    {
      "id": "020301",
      "text": "Áncash - Antonio Raymondi - Llamellin"
    },
    {
      "id": "020302",
      "text": "Áncash - Antonio Raymondi - Aczo"
    },
    {
      "id": "020303",
      "text": "Áncash - Antonio Raymondi - Chaccho"
    },
    {
      "id": "020304",
      "text": "Áncash - Antonio Raymondi - Chingas"
    },
    {
      "id": "020305",
      "text": "Áncash - Antonio Raymondi - Mirgas"
    },
    {
      "id": "020306",
      "text": "Áncash - Antonio Raymondi - San Juan de Rontoy"
    },
    {
      "id": "020401",
      "text": "Áncash - Asunción - Chacas"
    },
    {
      "id": "020402",
      "text": "Áncash - Asunción - Acochaca"
    },
    {
      "id": "020501",
      "text": "Áncash - Bolognesi - Chiquian"
    },
    {
      "id": "020502",
      "text": "Áncash - Bolognesi - Abelardo Pardo Lezameta"
    },
    {
      "id": "020503",
      "text": "Áncash - Bolognesi - Antonio Raymondi"
    },
    {
      "id": "020504",
      "text": "Áncash - Bolognesi - Aquia"
    },
    {
      "id": "020505",
      "text": "Áncash - Bolognesi - Cajacay"
    },
    {
      "id": "020506",
      "text": "Áncash - Bolognesi - Canis"
    },
    {
      "id": "020507",
      "text": "Áncash - Bolognesi - Colquioc"
    },
    {
      "id": "020508",
      "text": "Áncash - Bolognesi - Huallanca"
    },
    {
      "id": "020509",
      "text": "Áncash - Bolognesi - Huasta"
    },
    {
      "id": "020510",
      "text": "Áncash - Bolognesi - Huayllacayan"
    },
    {
      "id": "020511",
      "text": "Áncash - Bolognesi - La Primavera"
    },
    {
      "id": "020512",
      "text": "Áncash - Bolognesi - Mangas"
    },
    {
      "id": "020513",
      "text": "Áncash - Bolognesi - Pacllon"
    },
    {
      "id": "020514",
      "text": "Áncash - Bolognesi - San Miguel de Corpanqui"
    },
    {
      "id": "020515",
      "text": "Áncash - Bolognesi - Ticllos"
    },
    {
      "id": "020601",
      "text": "Áncash - Carhuaz - Carhuaz"
    },
    {
      "id": "020602",
      "text": "Áncash - Carhuaz - Acopampa"
    },
    {
      "id": "020603",
      "text": "Áncash - Carhuaz - Amashca"
    },
    {
      "id": "020604",
      "text": "Áncash - Carhuaz - Anta"
    },
    {
      "id": "020605",
      "text": "Áncash - Carhuaz - Ataquero"
    },
    {
      "id": "020606",
      "text": "Áncash - Carhuaz - Marcara"
    },
    {
      "id": "020607",
      "text": "Áncash - Carhuaz - Pariahuanca"
    },
    {
      "id": "020608",
      "text": "Áncash - Carhuaz - San Miguel de Aco"
    },
    {
      "id": "020609",
      "text": "Áncash - Carhuaz - Shilla"
    },
    {
      "id": "020610",
      "text": "Áncash - Carhuaz - Tinco"
    },
    {
      "id": "020611",
      "text": "Áncash - Carhuaz - Yungar"
    },
    {
      "id": "020701",
      "text": "Áncash - Carlos Fermín Fitzcarrald - San Luis"
    },
    {
      "id": "020702",
      "text": "Áncash - Carlos Fermín Fitzcarrald - San Nicolás"
    },
    {
      "id": "020703",
      "text": "Áncash - Carlos Fermín Fitzcarrald - Yauya"
    },
    {
      "id": "020801",
      "text": "Áncash - Casma - Casma"
    },
    {
      "id": "020802",
      "text": "Áncash - Casma - Buena Vista Alta"
    },
    {
      "id": "020803",
      "text": "Áncash - Casma - Comandante Noel"
    },
    {
      "id": "020804",
      "text": "Áncash - Casma - Yautan"
    },
    {
      "id": "020901",
      "text": "Áncash - Corongo - Corongo"
    },
    {
      "id": "020902",
      "text": "Áncash - Corongo - Aco"
    },
    {
      "id": "020903",
      "text": "Áncash - Corongo - Bambas"
    },
    {
      "id": "020904",
      "text": "Áncash - Corongo - Cusca"
    },
    {
      "id": "020905",
      "text": "Áncash - Corongo - La Pampa"
    },
    {
      "id": "020906",
      "text": "Áncash - Corongo - Yanac"
    },
    {
      "id": "020907",
      "text": "Áncash - Corongo - Yupan"
    },
    {
      "id": "021001",
      "text": "Áncash - Huari - Huari"
    },
    {
      "id": "021002",
      "text": "Áncash - Huari - Anra"
    },
    {
      "id": "021003",
      "text": "Áncash - Huari - Cajay"
    },
    {
      "id": "021004",
      "text": "Áncash - Huari - Chavin de Huantar"
    },
    {
      "id": "021005",
      "text": "Áncash - Huari - Huacachi"
    },
    {
      "id": "021006",
      "text": "Áncash - Huari - Huacchis"
    },
    {
      "id": "021007",
      "text": "Áncash - Huari - Huachis"
    },
    {
      "id": "021008",
      "text": "Áncash - Huari - Huantar"
    },
    {
      "id": "021009",
      "text": "Áncash - Huari - Masin"
    },
    {
      "id": "021010",
      "text": "Áncash - Huari - Paucas"
    },
    {
      "id": "021011",
      "text": "Áncash - Huari - Ponto"
    },
    {
      "id": "021012",
      "text": "Áncash - Huari - Rahuapampa"
    },
    {
      "id": "021013",
      "text": "Áncash - Huari - Rapayan"
    },
    {
      "id": "021014",
      "text": "Áncash - Huari - San Marcos"
    },
    {
      "id": "021015",
      "text": "Áncash - Huari - San Pedro de Chana"
    },
    {
      "id": "021016",
      "text": "Áncash - Huari - Uco"
    },
    {
      "id": "021101",
      "text": "Áncash - Huarmey - Huarmey"
    },
    {
      "id": "021102",
      "text": "Áncash - Huarmey - Cochapeti"
    },
    {
      "id": "021103",
      "text": "Áncash - Huarmey - Culebras"
    },
    {
      "id": "021104",
      "text": "Áncash - Huarmey - Huayan"
    },
    {
      "id": "021105",
      "text": "Áncash - Huarmey - Malvas"
    },
    {
      "id": "021201",
      "text": "Áncash - Huaylas - Caraz"
    },
    {
      "id": "021202",
      "text": "Áncash - Huaylas - Huallanca"
    },
    {
      "id": "021203",
      "text": "Áncash - Huaylas - Huata"
    },
    {
      "id": "021204",
      "text": "Áncash - Huaylas - Huaylas"
    },
    {
      "id": "021205",
      "text": "Áncash - Huaylas - Mato"
    },
    {
      "id": "021206",
      "text": "Áncash - Huaylas - Pamparomas"
    },
    {
      "id": "021207",
      "text": "Áncash - Huaylas - Pueblo Libre"
    },
    {
      "id": "021208",
      "text": "Áncash - Huaylas - Santa Cruz"
    },
    {
      "id": "021209",
      "text": "Áncash - Huaylas - Santo Toribio"
    },
    {
      "id": "021210",
      "text": "Áncash - Huaylas - Yuracmarca"
    },
    {
      "id": "021301",
      "text": "Áncash - Mariscal Luzuriaga - Piscobamba"
    },
    {
      "id": "021302",
      "text": "Áncash - Mariscal Luzuriaga - Casca"
    },
    {
      "id": "021303",
      "text": "Áncash - Mariscal Luzuriaga - Eleazar Guzmán Barron"
    },
    {
      "id": "021304",
      "text": "Áncash - Mariscal Luzuriaga - Fidel Olivas Escudero"
    },
    {
      "id": "021305",
      "text": "Áncash - Mariscal Luzuriaga - Llama"
    },
    {
      "id": "021306",
      "text": "Áncash - Mariscal Luzuriaga - Llumpa"
    },
    {
      "id": "021307",
      "text": "Áncash - Mariscal Luzuriaga - Lucma"
    },
    {
      "id": "021308",
      "text": "Áncash - Mariscal Luzuriaga - Musga"
    },
    {
      "id": "021401",
      "text": "Áncash - Ocros - Ocros"
    },
    {
      "id": "021402",
      "text": "Áncash - Ocros - Acas"
    },
    {
      "id": "021403",
      "text": "Áncash - Ocros - Cajamarquilla"
    },
    {
      "id": "021404",
      "text": "Áncash - Ocros - Carhuapampa"
    },
    {
      "id": "021405",
      "text": "Áncash - Ocros - Cochas"
    },
    {
      "id": "021406",
      "text": "Áncash - Ocros - Congas"
    },
    {
      "id": "021407",
      "text": "Áncash - Ocros - Llipa"
    },
    {
      "id": "021408",
      "text": "Áncash - Ocros - San Cristóbal de Rajan"
    },
    {
      "id": "021409",
      "text": "Áncash - Ocros - San Pedro"
    },
    {
      "id": "021410",
      "text": "Áncash - Ocros - Santiago de Chilcas"
    },
    {
      "id": "021501",
      "text": "Áncash - Pallasca - Cabana"
    },
    {
      "id": "021502",
      "text": "Áncash - Pallasca - Bolognesi"
    },
    {
      "id": "021503",
      "text": "Áncash - Pallasca - Conchucos"
    },
    {
      "id": "021504",
      "text": "Áncash - Pallasca - Huacaschuque"
    },
    {
      "id": "021505",
      "text": "Áncash - Pallasca - Huandoval"
    },
    {
      "id": "021506",
      "text": "Áncash - Pallasca - Lacabamba"
    },
    {
      "id": "021507",
      "text": "Áncash - Pallasca - Llapo"
    },
    {
      "id": "021508",
      "text": "Áncash - Pallasca - Pallasca"
    },
    {
      "id": "021509",
      "text": "Áncash - Pallasca - Pampas"
    },
    {
      "id": "021510",
      "text": "Áncash - Pallasca - Santa Rosa"
    },
    {
      "id": "021511",
      "text": "Áncash - Pallasca - Tauca"
    },
    {
      "id": "021601",
      "text": "Áncash - Pomabamba - Pomabamba"
    },
    {
      "id": "021602",
      "text": "Áncash - Pomabamba - Huayllan"
    },
    {
      "id": "021603",
      "text": "Áncash - Pomabamba - Parobamba"
    },
    {
      "id": "021604",
      "text": "Áncash - Pomabamba - Quinuabamba"
    },
    {
      "id": "021701",
      "text": "Áncash - Recuay - Recuay"
    },
    {
      "id": "021702",
      "text": "Áncash - Recuay - Catac"
    },
    {
      "id": "021703",
      "text": "Áncash - Recuay - Cotaparaco"
    },
    {
      "id": "021704",
      "text": "Áncash - Recuay - Huayllapampa"
    },
    {
      "id": "021705",
      "text": "Áncash - Recuay - Llacllin"
    },
    {
      "id": "021706",
      "text": "Áncash - Recuay - Marca"
    },
    {
      "id": "021707",
      "text": "Áncash - Recuay - Pampas Chico"
    },
    {
      "id": "021708",
      "text": "Áncash - Recuay - Pararin"
    },
    {
      "id": "021709",
      "text": "Áncash - Recuay - Tapacocha"
    },
    {
      "id": "021710",
      "text": "Áncash - Recuay - Ticapampa"
    },
    {
      "id": "021801",
      "text": "Áncash - Santa - Chimbote"
    },
    {
      "id": "021802",
      "text": "Áncash - Santa - Cáceres del Perú"
    },
    {
      "id": "021803",
      "text": "Áncash - Santa - Coishco"
    },
    {
      "id": "021804",
      "text": "Áncash - Santa - Macate"
    },
    {
      "id": "021805",
      "text": "Áncash - Santa - Moro"
    },
    {
      "id": "021806",
      "text": "Áncash - Santa - Nepeña"
    },
    {
      "id": "021807",
      "text": "Áncash - Santa - Samanco"
    },
    {
      "id": "021808",
      "text": "Áncash - Santa - Santa"
    },
    {
      "id": "021809",
      "text": "Áncash - Santa - Nuevo Chimbote"
    },
    {
      "id": "021901",
      "text": "Áncash - Sihuas - Sihuas"
    },
    {
      "id": "021902",
      "text": "Áncash - Sihuas - Acobamba"
    },
    {
      "id": "021903",
      "text": "Áncash - Sihuas - Alfonso Ugarte"
    },
    {
      "id": "021904",
      "text": "Áncash - Sihuas - Cashapampa"
    },
    {
      "id": "021905",
      "text": "Áncash - Sihuas - Chingalpo"
    },
    {
      "id": "021906",
      "text": "Áncash - Sihuas - Huayllabamba"
    },
    {
      "id": "021907",
      "text": "Áncash - Sihuas - Quiches"
    },
    {
      "id": "021908",
      "text": "Áncash - Sihuas - Ragash"
    },
    {
      "id": "021909",
      "text": "Áncash - Sihuas - San Juan"
    },
    {
      "id": "021910",
      "text": "Áncash - Sihuas - Sicsibamba"
    },
    {
      "id": "022001",
      "text": "Áncash - Yungay - Yungay"
    },
    {
      "id": "022002",
      "text": "Áncash - Yungay - Cascapara"
    },
    {
      "id": "022003",
      "text": "Áncash - Yungay - Mancos"
    },
    {
      "id": "022004",
      "text": "Áncash - Yungay - Matacoto"
    },
    {
      "id": "022005",
      "text": "Áncash - Yungay - Quillo"
    },
    {
      "id": "022006",
      "text": "Áncash - Yungay - Ranrahirca"
    },
    {
      "id": "022007",
      "text": "Áncash - Yungay - Shupluy"
    },
    {
      "id": "022008",
      "text": "Áncash - Yungay - Yanama"
    },
    {
      "id": "030101",
      "text": "Apurímac - Abancay - Abancay"
    },
    {
      "id": "030102",
      "text": "Apurímac - Abancay - Chacoche"
    },
    {
      "id": "030103",
      "text": "Apurímac - Abancay - Circa"
    },
    {
      "id": "030104",
      "text": "Apurímac - Abancay - Curahuasi"
    },
    {
      "id": "030105",
      "text": "Apurímac - Abancay - Huanipaca"
    },
    {
      "id": "030106",
      "text": "Apurímac - Abancay - Lambrama"
    },
    {
      "id": "030107",
      "text": "Apurímac - Abancay - Pichirhua"
    },
    {
      "id": "030108",
      "text": "Apurímac - Abancay - San Pedro de Cachora"
    },
    {
      "id": "030109",
      "text": "Apurímac - Abancay - Tamburco"
    },
    {
      "id": "030201",
      "text": "Apurímac - Andahuaylas - Andahuaylas"
    },
    {
      "id": "030202",
      "text": "Apurímac - Andahuaylas - Andarapa"
    },
    {
      "id": "030203",
      "text": "Apurímac - Andahuaylas - Chiara"
    },
    {
      "id": "030204",
      "text": "Apurímac - Andahuaylas - Huancarama"
    },
    {
      "id": "030205",
      "text": "Apurímac - Andahuaylas - Huancaray"
    },
    {
      "id": "030206",
      "text": "Apurímac - Andahuaylas - Huayana"
    },
    {
      "id": "030207",
      "text": "Apurímac - Andahuaylas - Kishuara"
    },
    {
      "id": "030208",
      "text": "Apurímac - Andahuaylas - Pacobamba"
    },
    {
      "id": "030209",
      "text": "Apurímac - Andahuaylas - Pacucha"
    },
    {
      "id": "030210",
      "text": "Apurímac - Andahuaylas - Pampachiri"
    },
    {
      "id": "030211",
      "text": "Apurímac - Andahuaylas - Pomacocha"
    },
    {
      "id": "030212",
      "text": "Apurímac - Andahuaylas - San Antonio de Cachi"
    },
    {
      "id": "030213",
      "text": "Apurímac - Andahuaylas - San Jerónimo"
    },
    {
      "id": "030214",
      "text": "Apurímac - Andahuaylas - San Miguel de Chaccrampa"
    },
    {
      "id": "030215",
      "text": "Apurímac - Andahuaylas - Santa María de Chicmo"
    },
    {
      "id": "030216",
      "text": "Apurímac - Andahuaylas - Talavera"
    },
    {
      "id": "030217",
      "text": "Apurímac - Andahuaylas - Tumay Huaraca"
    },
    {
      "id": "030218",
      "text": "Apurímac - Andahuaylas - Turpo"
    },
    {
      "id": "030219",
      "text": "Apurímac - Andahuaylas - Kaquiabamba"
    },
    {
      "id": "030220",
      "text": "Apurímac - Andahuaylas - José María Arguedas"
    },
    {
      "id": "030301",
      "text": "Apurímac - Antabamba - Antabamba"
    },
    {
      "id": "030302",
      "text": "Apurímac - Antabamba - El Oro"
    },
    {
      "id": "030303",
      "text": "Apurímac - Antabamba - Huaquirca"
    },
    {
      "id": "030304",
      "text": "Apurímac - Antabamba - Juan Espinoza Medrano"
    },
    {
      "id": "030305",
      "text": "Apurímac - Antabamba - Oropesa"
    },
    {
      "id": "030306",
      "text": "Apurímac - Antabamba - Pachaconas"
    },
    {
      "id": "030307",
      "text": "Apurímac - Antabamba - Sabaino"
    },
    {
      "id": "030401",
      "text": "Apurímac - Aymaraes - Chalhuanca"
    },
    {
      "id": "030402",
      "text": "Apurímac - Aymaraes - Capaya"
    },
    {
      "id": "030403",
      "text": "Apurímac - Aymaraes - Caraybamba"
    },
    {
      "id": "030404",
      "text": "Apurímac - Aymaraes - Chapimarca"
    },
    {
      "id": "030405",
      "text": "Apurímac - Aymaraes - Colcabamba"
    },
    {
      "id": "030406",
      "text": "Apurímac - Aymaraes - Cotaruse"
    },
    {
      "id": "030407",
      "text": "Apurímac - Aymaraes - Ihuayllo"
    },
    {
      "id": "030408",
      "text": "Apurímac - Aymaraes - Justo Apu Sahuaraura"
    },
    {
      "id": "030409",
      "text": "Apurímac - Aymaraes - Lucre"
    },
    {
      "id": "030410",
      "text": "Apurímac - Aymaraes - Pocohuanca"
    },
    {
      "id": "030411",
      "text": "Apurímac - Aymaraes - San Juan de Chacña"
    },
    {
      "id": "030412",
      "text": "Apurímac - Aymaraes - Sañayca"
    },
    {
      "id": "030413",
      "text": "Apurímac - Aymaraes - Soraya"
    },
    {
      "id": "030414",
      "text": "Apurímac - Aymaraes - Tapairihua"
    },
    {
      "id": "030415",
      "text": "Apurímac - Aymaraes - Tintay"
    },
    {
      "id": "030416",
      "text": "Apurímac - Aymaraes - Toraya"
    },
    {
      "id": "030417",
      "text": "Apurímac - Aymaraes - Yanaca"
    },
    {
      "id": "030501",
      "text": "Apurímac - Cotabambas - Tambobamba"
    },
    {
      "id": "030502",
      "text": "Apurímac - Cotabambas - Cotabambas"
    },
    {
      "id": "030503",
      "text": "Apurímac - Cotabambas - Coyllurqui"
    },
    {
      "id": "030504",
      "text": "Apurímac - Cotabambas - Haquira"
    },
    {
      "id": "030505",
      "text": "Apurímac - Cotabambas - Mara"
    },
    {
      "id": "030506",
      "text": "Apurímac - Cotabambas - Challhuahuacho"
    },
    {
      "id": "030601",
      "text": "Apurímac - Chincheros - Chincheros"
    },
    {
      "id": "030602",
      "text": "Apurímac - Chincheros - Anco_Huallo"
    },
    {
      "id": "030603",
      "text": "Apurímac - Chincheros - Cocharcas"
    },
    {
      "id": "030604",
      "text": "Apurímac - Chincheros - Huaccana"
    },
    {
      "id": "030605",
      "text": "Apurímac - Chincheros - Ocobamba"
    },
    {
      "id": "030606",
      "text": "Apurímac - Chincheros - Ongoy"
    },
    {
      "id": "030607",
      "text": "Apurímac - Chincheros - Uranmarca"
    },
    {
      "id": "030608",
      "text": "Apurímac - Chincheros - Ranracancha"
    },
    {
      "id": "030609",
      "text": "Apurímac - Chincheros - Rocchacc"
    },
    {
      "id": "030610",
      "text": "Apurímac - Chincheros - El Porvenir"
    },
    {
      "id": "030701",
      "text": "Apurímac - Grau - Chuquibambilla"
    },
    {
      "id": "030702",
      "text": "Apurímac - Grau - Curpahuasi"
    },
    {
      "id": "030703",
      "text": "Apurímac - Grau - Gamarra"
    },
    {
      "id": "030704",
      "text": "Apurímac - Grau - Huayllati"
    },
    {
      "id": "030705",
      "text": "Apurímac - Grau - Mamara"
    },
    {
      "id": "030706",
      "text": "Apurímac - Grau - Micaela Bastidas"
    },
    {
      "id": "030707",
      "text": "Apurímac - Grau - Pataypampa"
    },
    {
      "id": "030708",
      "text": "Apurímac - Grau - Progreso"
    },
    {
      "id": "030709",
      "text": "Apurímac - Grau - San Antonio"
    },
    {
      "id": "030710",
      "text": "Apurímac - Grau - Santa Rosa"
    },
    {
      "id": "030711",
      "text": "Apurímac - Grau - Turpay"
    },
    {
      "id": "030712",
      "text": "Apurímac - Grau - Vilcabamba"
    },
    {
      "id": "030713",
      "text": "Apurímac - Grau - Virundo"
    },
    {
      "id": "030714",
      "text": "Apurímac - Grau - Curasco"
    },
    {
      "id": "040101",
      "text": "Arequipa - Arequipa - Arequipa"
    },
    {
      "id": "040102",
      "text": "Arequipa - Arequipa - Alto Selva Alegre"
    },
    {
      "id": "040103",
      "text": "Arequipa - Arequipa - Cayma"
    },
    {
      "id": "040104",
      "text": "Arequipa - Arequipa - Cerro Colorado"
    },
    {
      "id": "040105",
      "text": "Arequipa - Arequipa - Characato"
    },
    {
      "id": "040106",
      "text": "Arequipa - Arequipa - Chiguata"
    },
    {
      "id": "040107",
      "text": "Arequipa - Arequipa - Jacobo Hunter"
    },
    {
      "id": "040108",
      "text": "Arequipa - Arequipa - La Joya"
    },
    {
      "id": "040109",
      "text": "Arequipa - Arequipa - Mariano Melgar"
    },
    {
      "id": "040110",
      "text": "Arequipa - Arequipa - Miraflores"
    },
    {
      "id": "040111",
      "text": "Arequipa - Arequipa - Mollebaya"
    },
    {
      "id": "040112",
      "text": "Arequipa - Arequipa - Paucarpata"
    },
    {
      "id": "040113",
      "text": "Arequipa - Arequipa - Pocsi"
    },
    {
      "id": "040114",
      "text": "Arequipa - Arequipa - Polobaya"
    },
    {
      "id": "040115",
      "text": "Arequipa - Arequipa - Quequeña"
    },
    {
      "id": "040116",
      "text": "Arequipa - Arequipa - Sabandia"
    },
    {
      "id": "040117",
      "text": "Arequipa - Arequipa - Sachaca"
    },
    {
      "id": "040118",
      "text": "Arequipa - Arequipa - San Juan de Siguas"
    },
    {
      "id": "040119",
      "text": "Arequipa - Arequipa - San Juan de Tarucani"
    },
    {
      "id": "040120",
      "text": "Arequipa - Arequipa - Santa Isabel de Siguas"
    },
    {
      "id": "040121",
      "text": "Arequipa - Arequipa - Santa Rita de Siguas"
    },
    {
      "id": "040122",
      "text": "Arequipa - Arequipa - Socabaya"
    },
    {
      "id": "040123",
      "text": "Arequipa - Arequipa - Tiabaya"
    },
    {
      "id": "040124",
      "text": "Arequipa - Arequipa - Uchumayo"
    },
    {
      "id": "040125",
      "text": "Arequipa - Arequipa - Vitor"
    },
    {
      "id": "040126",
      "text": "Arequipa - Arequipa - Yanahuara"
    },
    {
      "id": "040127",
      "text": "Arequipa - Arequipa - Yarabamba"
    },
    {
      "id": "040128",
      "text": "Arequipa - Arequipa - Yura"
    },
    {
      "id": "040129",
      "text": "Arequipa - Arequipa - José Luis Bustamante Y Rivero"
    },
    {
      "id": "040201",
      "text": "Arequipa - Camaná - Camaná"
    },
    {
      "id": "040202",
      "text": "Arequipa - Camaná - José María Quimper"
    },
    {
      "id": "040203",
      "text": "Arequipa - Camaná - Mariano Nicolás Valcárcel"
    },
    {
      "id": "040204",
      "text": "Arequipa - Camaná - Mariscal Cáceres"
    },
    {
      "id": "040205",
      "text": "Arequipa - Camaná - Nicolás de Pierola"
    },
    {
      "id": "040206",
      "text": "Arequipa - Camaná - Ocoña"
    },
    {
      "id": "040207",
      "text": "Arequipa - Camaná - Quilca"
    },
    {
      "id": "040208",
      "text": "Arequipa - Camaná - Samuel Pastor"
    },
    {
      "id": "040301",
      "text": "Arequipa - Caravelí - Caravelí"
    },
    {
      "id": "040302",
      "text": "Arequipa - Caravelí - Acarí"
    },
    {
      "id": "040303",
      "text": "Arequipa - Caravelí - Atico"
    },
    {
      "id": "040304",
      "text": "Arequipa - Caravelí - Atiquipa"
    },
    {
      "id": "040305",
      "text": "Arequipa - Caravelí - Bella Unión"
    },
    {
      "id": "040306",
      "text": "Arequipa - Caravelí - Cahuacho"
    },
    {
      "id": "040307",
      "text": "Arequipa - Caravelí - Chala"
    },
    {
      "id": "040308",
      "text": "Arequipa - Caravelí - Chaparra"
    },
    {
      "id": "040309",
      "text": "Arequipa - Caravelí - Huanuhuanu"
    },
    {
      "id": "040310",
      "text": "Arequipa - Caravelí - Jaqui"
    },
    {
      "id": "040311",
      "text": "Arequipa - Caravelí - Lomas"
    },
    {
      "id": "040312",
      "text": "Arequipa - Caravelí - Quicacha"
    },
    {
      "id": "040313",
      "text": "Arequipa - Caravelí - Yauca"
    },
    {
      "id": "040401",
      "text": "Arequipa - Castilla - Aplao"
    },
    {
      "id": "040402",
      "text": "Arequipa - Castilla - Andagua"
    },
    {
      "id": "040403",
      "text": "Arequipa - Castilla - Ayo"
    },
    {
      "id": "040404",
      "text": "Arequipa - Castilla - Chachas"
    },
    {
      "id": "040405",
      "text": "Arequipa - Castilla - Chilcaymarca"
    },
    {
      "id": "040406",
      "text": "Arequipa - Castilla - Choco"
    },
    {
      "id": "040407",
      "text": "Arequipa - Castilla - Huancarqui"
    },
    {
      "id": "040408",
      "text": "Arequipa - Castilla - Machaguay"
    },
    {
      "id": "040409",
      "text": "Arequipa - Castilla - Orcopampa"
    },
    {
      "id": "040410",
      "text": "Arequipa - Castilla - Pampacolca"
    },
    {
      "id": "040411",
      "text": "Arequipa - Castilla - Tipan"
    },
    {
      "id": "040412",
      "text": "Arequipa - Castilla - Uñon"
    },
    {
      "id": "040413",
      "text": "Arequipa - Castilla - Uraca"
    },
    {
      "id": "040414",
      "text": "Arequipa - Castilla - Viraco"
    },
    {
      "id": "040501",
      "text": "Arequipa - Caylloma - Chivay"
    },
    {
      "id": "040502",
      "text": "Arequipa - Caylloma - Achoma"
    },
    {
      "id": "040503",
      "text": "Arequipa - Caylloma - Cabanaconde"
    },
    {
      "id": "040504",
      "text": "Arequipa - Caylloma - Callalli"
    },
    {
      "id": "040505",
      "text": "Arequipa - Caylloma - Caylloma"
    },
    {
      "id": "040506",
      "text": "Arequipa - Caylloma - Coporaque"
    },
    {
      "id": "040507",
      "text": "Arequipa - Caylloma - Huambo"
    },
    {
      "id": "040508",
      "text": "Arequipa - Caylloma - Huanca"
    },
    {
      "id": "040509",
      "text": "Arequipa - Caylloma - Ichupampa"
    },
    {
      "id": "040510",
      "text": "Arequipa - Caylloma - Lari"
    },
    {
      "id": "040511",
      "text": "Arequipa - Caylloma - Lluta"
    },
    {
      "id": "040512",
      "text": "Arequipa - Caylloma - Maca"
    },
    {
      "id": "040513",
      "text": "Arequipa - Caylloma - Madrigal"
    },
    {
      "id": "040514",
      "text": "Arequipa - Caylloma - San Antonio de Chuca"
    },
    {
      "id": "040515",
      "text": "Arequipa - Caylloma - Sibayo"
    },
    {
      "id": "040516",
      "text": "Arequipa - Caylloma - Tapay"
    },
    {
      "id": "040517",
      "text": "Arequipa - Caylloma - Tisco"
    },
    {
      "id": "040518",
      "text": "Arequipa - Caylloma - Tuti"
    },
    {
      "id": "040519",
      "text": "Arequipa - Caylloma - Yanque"
    },
    {
      "id": "040520",
      "text": "Arequipa - Caylloma - Majes"
    },
    {
      "id": "040601",
      "text": "Arequipa - Condesuyos - Chuquibamba"
    },
    {
      "id": "040602",
      "text": "Arequipa - Condesuyos - Andaray"
    },
    {
      "id": "040603",
      "text": "Arequipa - Condesuyos - Cayarani"
    },
    {
      "id": "040604",
      "text": "Arequipa - Condesuyos - Chichas"
    },
    {
      "id": "040605",
      "text": "Arequipa - Condesuyos - Iray"
    },
    {
      "id": "040606",
      "text": "Arequipa - Condesuyos - Río Grande"
    },
    {
      "id": "040607",
      "text": "Arequipa - Condesuyos - Salamanca"
    },
    {
      "id": "040608",
      "text": "Arequipa - Condesuyos - Yanaquihua"
    },
    {
      "id": "040701",
      "text": "Arequipa - Islay - Mollendo"
    },
    {
      "id": "040702",
      "text": "Arequipa - Islay - Cocachacra"
    },
    {
      "id": "040703",
      "text": "Arequipa - Islay - Dean Valdivia"
    },
    {
      "id": "040704",
      "text": "Arequipa - Islay - Islay"
    },
    {
      "id": "040705",
      "text": "Arequipa - Islay - Mejia"
    },
    {
      "id": "040706",
      "text": "Arequipa - Islay - Punta de Bombón"
    },
    {
      "id": "040801",
      "text": "Arequipa - La Uniòn - Cotahuasi"
    },
    {
      "id": "040802",
      "text": "Arequipa - La Uniòn - Alca"
    },
    {
      "id": "040803",
      "text": "Arequipa - La Uniòn - Charcana"
    },
    {
      "id": "040804",
      "text": "Arequipa - La Uniòn - Huaynacotas"
    },
    {
      "id": "040805",
      "text": "Arequipa - La Uniòn - Pampamarca"
    },
    {
      "id": "040806",
      "text": "Arequipa - La Uniòn - Puyca"
    },
    {
      "id": "040807",
      "text": "Arequipa - La Uniòn - Quechualla"
    },
    {
      "id": "040808",
      "text": "Arequipa - La Uniòn - Sayla"
    },
    {
      "id": "040809",
      "text": "Arequipa - La Uniòn - Tauria"
    },
    {
      "id": "040810",
      "text": "Arequipa - La Uniòn - Tomepampa"
    },
    {
      "id": "040811",
      "text": "Arequipa - La Uniòn - Toro"
    },
    {
      "id": "050101",
      "text": "Ayacucho - Huamanga - Ayacucho"
    },
    {
      "id": "050102",
      "text": "Ayacucho - Huamanga - Acocro"
    },
    {
      "id": "050103",
      "text": "Ayacucho - Huamanga - Acos Vinchos"
    },
    {
      "id": "050104",
      "text": "Ayacucho - Huamanga - Carmen Alto"
    },
    {
      "id": "050105",
      "text": "Ayacucho - Huamanga - Chiara"
    },
    {
      "id": "050106",
      "text": "Ayacucho - Huamanga - Ocros"
    },
    {
      "id": "050107",
      "text": "Ayacucho - Huamanga - Pacaycasa"
    },
    {
      "id": "050108",
      "text": "Ayacucho - Huamanga - Quinua"
    },
    {
      "id": "050109",
      "text": "Ayacucho - Huamanga - San José de Ticllas"
    },
    {
      "id": "050110",
      "text": "Ayacucho - Huamanga - San Juan Bautista"
    },
    {
      "id": "050111",
      "text": "Ayacucho - Huamanga - Santiago de Pischa"
    },
    {
      "id": "050112",
      "text": "Ayacucho - Huamanga - Socos"
    },
    {
      "id": "050113",
      "text": "Ayacucho - Huamanga - Tambillo"
    },
    {
      "id": "050114",
      "text": "Ayacucho - Huamanga - Vinchos"
    },
    {
      "id": "050115",
      "text": "Ayacucho - Huamanga - Jesús Nazareno"
    },
    {
      "id": "050116",
      "text": "Ayacucho - Huamanga - Andrés Avelino Cáceres Dorregaray"
    },
    {
      "id": "050201",
      "text": "Ayacucho - Cangallo - Cangallo"
    },
    {
      "id": "050202",
      "text": "Ayacucho - Cangallo - Chuschi"
    },
    {
      "id": "050203",
      "text": "Ayacucho - Cangallo - Los Morochucos"
    },
    {
      "id": "050204",
      "text": "Ayacucho - Cangallo - María Parado de Bellido"
    },
    {
      "id": "050205",
      "text": "Ayacucho - Cangallo - Paras"
    },
    {
      "id": "050206",
      "text": "Ayacucho - Cangallo - Totos"
    },
    {
      "id": "050301",
      "text": "Ayacucho - Huanca Sancos - Sancos"
    },
    {
      "id": "050302",
      "text": "Ayacucho - Huanca Sancos - Carapo"
    },
    {
      "id": "050303",
      "text": "Ayacucho - Huanca Sancos - Sacsamarca"
    },
    {
      "id": "050304",
      "text": "Ayacucho - Huanca Sancos - Santiago de Lucanamarca"
    },
    {
      "id": "050401",
      "text": "Ayacucho - Huanta - Huanta"
    },
    {
      "id": "050402",
      "text": "Ayacucho - Huanta - Ayahuanco"
    },
    {
      "id": "050403",
      "text": "Ayacucho - Huanta - Huamanguilla"
    },
    {
      "id": "050404",
      "text": "Ayacucho - Huanta - Iguain"
    },
    {
      "id": "050405",
      "text": "Ayacucho - Huanta - Luricocha"
    },
    {
      "id": "050406",
      "text": "Ayacucho - Huanta - Santillana"
    },
    {
      "id": "050407",
      "text": "Ayacucho - Huanta - Sivia"
    },
    {
      "id": "050408",
      "text": "Ayacucho - Huanta - Llochegua"
    },
    {
      "id": "050409",
      "text": "Ayacucho - Huanta - Canayre"
    },
    {
      "id": "050410",
      "text": "Ayacucho - Huanta - Uchuraccay"
    },
    {
      "id": "050411",
      "text": "Ayacucho - Huanta - Pucacolpa"
    },
    {
      "id": "050412",
      "text": "Ayacucho - Huanta - Chaca"
    },
    {
      "id": "050501",
      "text": "Ayacucho - La Mar - San Miguel"
    },
    {
      "id": "050502",
      "text": "Ayacucho - La Mar - Anco"
    },
    {
      "id": "050503",
      "text": "Ayacucho - La Mar - Ayna"
    },
    {
      "id": "050504",
      "text": "Ayacucho - La Mar - Chilcas"
    },
    {
      "id": "050505",
      "text": "Ayacucho - La Mar - Chungui"
    },
    {
      "id": "050506",
      "text": "Ayacucho - La Mar - Luis Carranza"
    },
    {
      "id": "050507",
      "text": "Ayacucho - La Mar - Santa Rosa"
    },
    {
      "id": "050508",
      "text": "Ayacucho - La Mar - Tambo"
    },
    {
      "id": "050509",
      "text": "Ayacucho - La Mar - Samugari"
    },
    {
      "id": "050510",
      "text": "Ayacucho - La Mar - Anchihuay"
    },
    {
      "id": "050601",
      "text": "Ayacucho - Lucanas - Puquio"
    },
    {
      "id": "050602",
      "text": "Ayacucho - Lucanas - Aucara"
    },
    {
      "id": "050603",
      "text": "Ayacucho - Lucanas - Cabana"
    },
    {
      "id": "050604",
      "text": "Ayacucho - Lucanas - Carmen Salcedo"
    },
    {
      "id": "050605",
      "text": "Ayacucho - Lucanas - Chaviña"
    },
    {
      "id": "050606",
      "text": "Ayacucho - Lucanas - Chipao"
    },
    {
      "id": "050607",
      "text": "Ayacucho - Lucanas - Huac-Huas"
    },
    {
      "id": "050608",
      "text": "Ayacucho - Lucanas - Laramate"
    },
    {
      "id": "050609",
      "text": "Ayacucho - Lucanas - Leoncio Prado"
    },
    {
      "id": "050610",
      "text": "Ayacucho - Lucanas - Llauta"
    },
    {
      "id": "050611",
      "text": "Ayacucho - Lucanas - Lucanas"
    },
    {
      "id": "050612",
      "text": "Ayacucho - Lucanas - Ocaña"
    },
    {
      "id": "050613",
      "text": "Ayacucho - Lucanas - Otoca"
    },
    {
      "id": "050614",
      "text": "Ayacucho - Lucanas - Saisa"
    },
    {
      "id": "050615",
      "text": "Ayacucho - Lucanas - San Cristóbal"
    },
    {
      "id": "050616",
      "text": "Ayacucho - Lucanas - San Juan"
    },
    {
      "id": "050617",
      "text": "Ayacucho - Lucanas - San Pedro"
    },
    {
      "id": "050618",
      "text": "Ayacucho - Lucanas - San Pedro de Palco"
    },
    {
      "id": "050619",
      "text": "Ayacucho - Lucanas - Sancos"
    },
    {
      "id": "050620",
      "text": "Ayacucho - Lucanas - Santa Ana de Huaycahuacho"
    },
    {
      "id": "050621",
      "text": "Ayacucho - Lucanas - Santa Lucia"
    },
    {
      "id": "050701",
      "text": "Ayacucho - Parinacochas - Coracora"
    },
    {
      "id": "050702",
      "text": "Ayacucho - Parinacochas - Chumpi"
    },
    {
      "id": "050703",
      "text": "Ayacucho - Parinacochas - Coronel Castañeda"
    },
    {
      "id": "050704",
      "text": "Ayacucho - Parinacochas - Pacapausa"
    },
    {
      "id": "050705",
      "text": "Ayacucho - Parinacochas - Pullo"
    },
    {
      "id": "050706",
      "text": "Ayacucho - Parinacochas - Puyusca"
    },
    {
      "id": "050707",
      "text": "Ayacucho - Parinacochas - San Francisco de Ravacayco"
    },
    {
      "id": "050708",
      "text": "Ayacucho - Parinacochas - Upahuacho"
    },
    {
      "id": "050801",
      "text": "Ayacucho - Pàucar del Sara Sara - Pausa"
    },
    {
      "id": "050802",
      "text": "Ayacucho - Pàucar del Sara Sara - Colta"
    },
    {
      "id": "050803",
      "text": "Ayacucho - Pàucar del Sara Sara - Corculla"
    },
    {
      "id": "050804",
      "text": "Ayacucho - Pàucar del Sara Sara - Lampa"
    },
    {
      "id": "050805",
      "text": "Ayacucho - Pàucar del Sara Sara - Marcabamba"
    },
    {
      "id": "050806",
      "text": "Ayacucho - Pàucar del Sara Sara - Oyolo"
    },
    {
      "id": "050807",
      "text": "Ayacucho - Pàucar del Sara Sara - Pararca"
    },
    {
      "id": "050808",
      "text": "Ayacucho - Pàucar del Sara Sara - San Javier de Alpabamba"
    },
    {
      "id": "050809",
      "text": "Ayacucho - Pàucar del Sara Sara - San José de Ushua"
    },
    {
      "id": "050810",
      "text": "Ayacucho - Pàucar del Sara Sara - Sara Sara"
    },
    {
      "id": "050901",
      "text": "Ayacucho - Sucre - Querobamba"
    },
    {
      "id": "050902",
      "text": "Ayacucho - Sucre - Belén"
    },
    {
      "id": "050903",
      "text": "Ayacucho - Sucre - Chalcos"
    },
    {
      "id": "050904",
      "text": "Ayacucho - Sucre - Chilcayoc"
    },
    {
      "id": "050905",
      "text": "Ayacucho - Sucre - Huacaña"
    },
    {
      "id": "050906",
      "text": "Ayacucho - Sucre - Morcolla"
    },
    {
      "id": "050907",
      "text": "Ayacucho - Sucre - Paico"
    },
    {
      "id": "050908",
      "text": "Ayacucho - Sucre - San Pedro de Larcay"
    },
    {
      "id": "050909",
      "text": "Ayacucho - Sucre - San Salvador de Quije"
    },
    {
      "id": "050910",
      "text": "Ayacucho - Sucre - Santiago de Paucaray"
    },
    {
      "id": "050911",
      "text": "Ayacucho - Sucre - Soras"
    },
    {
      "id": "051001",
      "text": "Ayacucho - Víctor Fajardo - Huancapi"
    },
    {
      "id": "051002",
      "text": "Ayacucho - Víctor Fajardo - Alcamenca"
    },
    {
      "id": "051003",
      "text": "Ayacucho - Víctor Fajardo - Apongo"
    },
    {
      "id": "051004",
      "text": "Ayacucho - Víctor Fajardo - Asquipata"
    },
    {
      "id": "051005",
      "text": "Ayacucho - Víctor Fajardo - Canaria"
    },
    {
      "id": "051006",
      "text": "Ayacucho - Víctor Fajardo - Cayara"
    },
    {
      "id": "051007",
      "text": "Ayacucho - Víctor Fajardo - Colca"
    },
    {
      "id": "051008",
      "text": "Ayacucho - Víctor Fajardo - Huamanquiquia"
    },
    {
      "id": "051009",
      "text": "Ayacucho - Víctor Fajardo - Huancaraylla"
    },
    {
      "id": "051010",
      "text": "Ayacucho - Víctor Fajardo - Huaya"
    },
    {
      "id": "051011",
      "text": "Ayacucho - Víctor Fajardo - Sarhua"
    },
    {
      "id": "051012",
      "text": "Ayacucho - Víctor Fajardo - Vilcanchos"
    },
    {
      "id": "051101",
      "text": "Ayacucho - Vilcas Huamán - Vilcas Huaman"
    },
    {
      "id": "051102",
      "text": "Ayacucho - Vilcas Huamán - Accomarca"
    },
    {
      "id": "051103",
      "text": "Ayacucho - Vilcas Huamán - Carhuanca"
    },
    {
      "id": "051104",
      "text": "Ayacucho - Vilcas Huamán - Concepción"
    },
    {
      "id": "051105",
      "text": "Ayacucho - Vilcas Huamán - Huambalpa"
    },
    {
      "id": "051106",
      "text": "Ayacucho - Vilcas Huamán - Independencia"
    },
    {
      "id": "051107",
      "text": "Ayacucho - Vilcas Huamán - Saurama"
    },
    {
      "id": "051108",
      "text": "Ayacucho - Vilcas Huamán - Vischongo"
    },
    {
      "id": "060101",
      "text": "Cajamarca - Cajamarca - Cajamarca"
    },
    {
      "id": "060102",
      "text": "Cajamarca - Cajamarca - Asunción"
    },
    {
      "id": "060103",
      "text": "Cajamarca - Cajamarca - Chetilla"
    },
    {
      "id": "060104",
      "text": "Cajamarca - Cajamarca - Cospan"
    },
    {
      "id": "060105",
      "text": "Cajamarca - Cajamarca - Encañada"
    },
    {
      "id": "060106",
      "text": "Cajamarca - Cajamarca - Jesús"
    },
    {
      "id": "060107",
      "text": "Cajamarca - Cajamarca - Llacanora"
    },
    {
      "id": "060108",
      "text": "Cajamarca - Cajamarca - Los Baños del Inca"
    },
    {
      "id": "060109",
      "text": "Cajamarca - Cajamarca - Magdalena"
    },
    {
      "id": "060110",
      "text": "Cajamarca - Cajamarca - Matara"
    },
    {
      "id": "060111",
      "text": "Cajamarca - Cajamarca - Namora"
    },
    {
      "id": "060112",
      "text": "Cajamarca - Cajamarca - San Juan"
    },
    {
      "id": "060201",
      "text": "Cajamarca - Cajabamba - Cajabamba"
    },
    {
      "id": "060202",
      "text": "Cajamarca - Cajabamba - Cachachi"
    },
    {
      "id": "060203",
      "text": "Cajamarca - Cajabamba - Condebamba"
    },
    {
      "id": "060204",
      "text": "Cajamarca - Cajabamba - Sitacocha"
    },
    {
      "id": "060301",
      "text": "Cajamarca - Celendín - Celendín"
    },
    {
      "id": "060302",
      "text": "Cajamarca - Celendín - Chumuch"
    },
    {
      "id": "060303",
      "text": "Cajamarca - Celendín - Cortegana"
    },
    {
      "id": "060304",
      "text": "Cajamarca - Celendín - Huasmin"
    },
    {
      "id": "060305",
      "text": "Cajamarca - Celendín - Jorge Chávez"
    },
    {
      "id": "060306",
      "text": "Cajamarca - Celendín - José Gálvez"
    },
    {
      "id": "060307",
      "text": "Cajamarca - Celendín - Miguel Iglesias"
    },
    {
      "id": "060308",
      "text": "Cajamarca - Celendín - Oxamarca"
    },
    {
      "id": "060309",
      "text": "Cajamarca - Celendín - Sorochuco"
    },
    {
      "id": "060310",
      "text": "Cajamarca - Celendín - Sucre"
    },
    {
      "id": "060311",
      "text": "Cajamarca - Celendín - Utco"
    },
    {
      "id": "060312",
      "text": "Cajamarca - Celendín - La Libertad de Pallan"
    },
    {
      "id": "060401",
      "text": "Cajamarca - Chota - Chota"
    },
    {
      "id": "060402",
      "text": "Cajamarca - Chota - Anguia"
    },
    {
      "id": "060403",
      "text": "Cajamarca - Chota - Chadin"
    },
    {
      "id": "060404",
      "text": "Cajamarca - Chota - Chiguirip"
    },
    {
      "id": "060405",
      "text": "Cajamarca - Chota - Chimban"
    },
    {
      "id": "060406",
      "text": "Cajamarca - Chota - Choropampa"
    },
    {
      "id": "060407",
      "text": "Cajamarca - Chota - Cochabamba"
    },
    {
      "id": "060408",
      "text": "Cajamarca - Chota - Conchan"
    },
    {
      "id": "060409",
      "text": "Cajamarca - Chota - Huambos"
    },
    {
      "id": "060410",
      "text": "Cajamarca - Chota - Lajas"
    },
    {
      "id": "060411",
      "text": "Cajamarca - Chota - Llama"
    },
    {
      "id": "060412",
      "text": "Cajamarca - Chota - Miracosta"
    },
    {
      "id": "060413",
      "text": "Cajamarca - Chota - Paccha"
    },
    {
      "id": "060414",
      "text": "Cajamarca - Chota - Pion"
    },
    {
      "id": "060415",
      "text": "Cajamarca - Chota - Querocoto"
    },
    {
      "id": "060416",
      "text": "Cajamarca - Chota - San Juan de Licupis"
    },
    {
      "id": "060417",
      "text": "Cajamarca - Chota - Tacabamba"
    },
    {
      "id": "060418",
      "text": "Cajamarca - Chota - Tocmoche"
    },
    {
      "id": "060419",
      "text": "Cajamarca - Chota - Chalamarca"
    },
    {
      "id": "060501",
      "text": "Cajamarca - Contumazá - Contumaza"
    },
    {
      "id": "060502",
      "text": "Cajamarca - Contumazá - Chilete"
    },
    {
      "id": "060503",
      "text": "Cajamarca - Contumazá - Cupisnique"
    },
    {
      "id": "060504",
      "text": "Cajamarca - Contumazá - Guzmango"
    },
    {
      "id": "060505",
      "text": "Cajamarca - Contumazá - San Benito"
    },
    {
      "id": "060506",
      "text": "Cajamarca - Contumazá - Santa Cruz de Toledo"
    },
    {
      "id": "060507",
      "text": "Cajamarca - Contumazá - Tantarica"
    },
    {
      "id": "060508",
      "text": "Cajamarca - Contumazá - Yonan"
    },
    {
      "id": "060601",
      "text": "Cajamarca - Cutervo - Cutervo"
    },
    {
      "id": "060602",
      "text": "Cajamarca - Cutervo - Callayuc"
    },
    {
      "id": "060603",
      "text": "Cajamarca - Cutervo - Choros"
    },
    {
      "id": "060604",
      "text": "Cajamarca - Cutervo - Cujillo"
    },
    {
      "id": "060605",
      "text": "Cajamarca - Cutervo - La Ramada"
    },
    {
      "id": "060606",
      "text": "Cajamarca - Cutervo - Pimpingos"
    },
    {
      "id": "060607",
      "text": "Cajamarca - Cutervo - Querocotillo"
    },
    {
      "id": "060608",
      "text": "Cajamarca - Cutervo - San Andrés de Cutervo"
    },
    {
      "id": "060609",
      "text": "Cajamarca - Cutervo - San Juan de Cutervo"
    },
    {
      "id": "060610",
      "text": "Cajamarca - Cutervo - San Luis de Lucma"
    },
    {
      "id": "060611",
      "text": "Cajamarca - Cutervo - Santa Cruz"
    },
    {
      "id": "060612",
      "text": "Cajamarca - Cutervo - Santo Domingo de la Capilla"
    },
    {
      "id": "060613",
      "text": "Cajamarca - Cutervo - Santo Tomas"
    },
    {
      "id": "060614",
      "text": "Cajamarca - Cutervo - Socota"
    },
    {
      "id": "060615",
      "text": "Cajamarca - Cutervo - Toribio Casanova"
    },
    {
      "id": "060701",
      "text": "Cajamarca - Hualgayoc - Bambamarca"
    },
    {
      "id": "060702",
      "text": "Cajamarca - Hualgayoc - Chugur"
    },
    {
      "id": "060703",
      "text": "Cajamarca - Hualgayoc - Hualgayoc"
    },
    {
      "id": "060801",
      "text": "Cajamarca - Jaén - Jaén"
    },
    {
      "id": "060802",
      "text": "Cajamarca - Jaén - Bellavista"
    },
    {
      "id": "060803",
      "text": "Cajamarca - Jaén - Chontali"
    },
    {
      "id": "060804",
      "text": "Cajamarca - Jaén - Colasay"
    },
    {
      "id": "060805",
      "text": "Cajamarca - Jaén - Huabal"
    },
    {
      "id": "060806",
      "text": "Cajamarca - Jaén - Las Pirias"
    },
    {
      "id": "060807",
      "text": "Cajamarca - Jaén - Pomahuaca"
    },
    {
      "id": "060808",
      "text": "Cajamarca - Jaén - Pucara"
    },
    {
      "id": "060809",
      "text": "Cajamarca - Jaén - Sallique"
    },
    {
      "id": "060810",
      "text": "Cajamarca - Jaén - San Felipe"
    },
    {
      "id": "060811",
      "text": "Cajamarca - Jaén - San José del Alto"
    },
    {
      "id": "060812",
      "text": "Cajamarca - Jaén - Santa Rosa"
    },
    {
      "id": "060901",
      "text": "Cajamarca - San Ignacio - San Ignacio"
    },
    {
      "id": "060902",
      "text": "Cajamarca - San Ignacio - Chirinos"
    },
    {
      "id": "060903",
      "text": "Cajamarca - San Ignacio - Huarango"
    },
    {
      "id": "060904",
      "text": "Cajamarca - San Ignacio - La Coipa"
    },
    {
      "id": "060905",
      "text": "Cajamarca - San Ignacio - Namballe"
    },
    {
      "id": "060906",
      "text": "Cajamarca - San Ignacio - San José de Lourdes"
    },
    {
      "id": "060907",
      "text": "Cajamarca - San Ignacio - Tabaconas"
    },
    {
      "id": "061001",
      "text": "Cajamarca - San Marcos - Pedro Gálvez"
    },
    {
      "id": "061002",
      "text": "Cajamarca - San Marcos - Chancay"
    },
    {
      "id": "061003",
      "text": "Cajamarca - San Marcos - Eduardo Villanueva"
    },
    {
      "id": "061004",
      "text": "Cajamarca - San Marcos - Gregorio Pita"
    },
    {
      "id": "061005",
      "text": "Cajamarca - San Marcos - Ichocan"
    },
    {
      "id": "061006",
      "text": "Cajamarca - San Marcos - José Manuel Quiroz"
    },
    {
      "id": "061007",
      "text": "Cajamarca - San Marcos - José Sabogal"
    },
    {
      "id": "061101",
      "text": "Cajamarca - San Miguel - San Miguel"
    },
    {
      "id": "061102",
      "text": "Cajamarca - San Miguel - Bolívar"
    },
    {
      "id": "061103",
      "text": "Cajamarca - San Miguel - Calquis"
    },
    {
      "id": "061104",
      "text": "Cajamarca - San Miguel - Catilluc"
    },
    {
      "id": "061105",
      "text": "Cajamarca - San Miguel - El Prado"
    },
    {
      "id": "061106",
      "text": "Cajamarca - San Miguel - La Florida"
    },
    {
      "id": "061107",
      "text": "Cajamarca - San Miguel - Llapa"
    },
    {
      "id": "061108",
      "text": "Cajamarca - San Miguel - Nanchoc"
    },
    {
      "id": "061109",
      "text": "Cajamarca - San Miguel - Niepos"
    },
    {
      "id": "061110",
      "text": "Cajamarca - San Miguel - San Gregorio"
    },
    {
      "id": "061111",
      "text": "Cajamarca - San Miguel - San Silvestre de Cochan"
    },
    {
      "id": "061112",
      "text": "Cajamarca - San Miguel - Tongod"
    },
    {
      "id": "061113",
      "text": "Cajamarca - San Miguel - Unión Agua Blanca"
    },
    {
      "id": "061201",
      "text": "Cajamarca - San Pablo - San Pablo"
    },
    {
      "id": "061202",
      "text": "Cajamarca - San Pablo - San Bernardino"
    },
    {
      "id": "061203",
      "text": "Cajamarca - San Pablo - San Luis"
    },
    {
      "id": "061204",
      "text": "Cajamarca - San Pablo - Tumbaden"
    },
    {
      "id": "061301",
      "text": "Cajamarca - Santa Cruz - Santa Cruz"
    },
    {
      "id": "061302",
      "text": "Cajamarca - Santa Cruz - Andabamba"
    },
    {
      "id": "061303",
      "text": "Cajamarca - Santa Cruz - Catache"
    },
    {
      "id": "061304",
      "text": "Cajamarca - Santa Cruz - Chancaybaños"
    },
    {
      "id": "061305",
      "text": "Cajamarca - Santa Cruz - La Esperanza"
    },
    {
      "id": "061306",
      "text": "Cajamarca - Santa Cruz - Ninabamba"
    },
    {
      "id": "061307",
      "text": "Cajamarca - Santa Cruz - Pulan"
    },
    {
      "id": "061308",
      "text": "Cajamarca - Santa Cruz - Saucepampa"
    },
    {
      "id": "061309",
      "text": "Cajamarca - Santa Cruz - Sexi"
    },
    {
      "id": "061310",
      "text": "Cajamarca - Santa Cruz - Uticyacu"
    },
    {
      "id": "061311",
      "text": "Cajamarca - Santa Cruz - Yauyucan"
    },
    {
      "id": "070101",
      "text": "Callao - Prov. Const. del Callao - Callao"
    },
    {
      "id": "070102",
      "text": "Callao - Prov. Const. del Callao - Bellavista"
    },
    {
      "id": "070103",
      "text": "Callao - Prov. Const. del Callao - Carmen de la Legua Reynoso"
    },
    {
      "id": "070104",
      "text": "Callao - Prov. Const. del Callao - La Perla"
    },
    {
      "id": "070105",
      "text": "Callao - Prov. Const. del Callao - La Punta"
    },
    {
      "id": "070106",
      "text": "Callao - Prov. Const. del Callao - Ventanilla"
    },
    {
      "id": "070107",
      "text": "Callao - Prov. Const. del Callao - Mi Perú"
    },
    {
      "id": "080101",
      "text": "Cusco - Cusco - Cusco"
    },
    {
      "id": "080102",
      "text": "Cusco - Cusco - Ccorca"
    },
    {
      "id": "080103",
      "text": "Cusco - Cusco - Poroy"
    },
    {
      "id": "080104",
      "text": "Cusco - Cusco - San Jerónimo"
    },
    {
      "id": "080105",
      "text": "Cusco - Cusco - San Sebastian"
    },
    {
      "id": "080106",
      "text": "Cusco - Cusco - Santiago"
    },
    {
      "id": "080107",
      "text": "Cusco - Cusco - Saylla"
    },
    {
      "id": "080108",
      "text": "Cusco - Cusco - Wanchaq"
    },
    {
      "id": "080201",
      "text": "Cusco - Acomayo - Acomayo"
    },
    {
      "id": "080202",
      "text": "Cusco - Acomayo - Acopia"
    },
    {
      "id": "080203",
      "text": "Cusco - Acomayo - Acos"
    },
    {
      "id": "080204",
      "text": "Cusco - Acomayo - Mosoc Llacta"
    },
    {
      "id": "080205",
      "text": "Cusco - Acomayo - Pomacanchi"
    },
    {
      "id": "080206",
      "text": "Cusco - Acomayo - Rondocan"
    },
    {
      "id": "080207",
      "text": "Cusco - Acomayo - Sangarara"
    },
    {
      "id": "080301",
      "text": "Cusco - Anta - Anta"
    },
    {
      "id": "080302",
      "text": "Cusco - Anta - Ancahuasi"
    },
    {
      "id": "080303",
      "text": "Cusco - Anta - Cachimayo"
    },
    {
      "id": "080304",
      "text": "Cusco - Anta - Chinchaypujio"
    },
    {
      "id": "080305",
      "text": "Cusco - Anta - Huarocondo"
    },
    {
      "id": "080306",
      "text": "Cusco - Anta - Limatambo"
    },
    {
      "id": "080307",
      "text": "Cusco - Anta - Mollepata"
    },
    {
      "id": "080308",
      "text": "Cusco - Anta - Pucyura"
    },
    {
      "id": "080309",
      "text": "Cusco - Anta - Zurite"
    },
    {
      "id": "080401",
      "text": "Cusco - Calca - Calca"
    },
    {
      "id": "080402",
      "text": "Cusco - Calca - Coya"
    },
    {
      "id": "080403",
      "text": "Cusco - Calca - Lamay"
    },
    {
      "id": "080404",
      "text": "Cusco - Calca - Lares"
    },
    {
      "id": "080405",
      "text": "Cusco - Calca - Pisac"
    },
    {
      "id": "080406",
      "text": "Cusco - Calca - San Salvador"
    },
    {
      "id": "080407",
      "text": "Cusco - Calca - Taray"
    },
    {
      "id": "080408",
      "text": "Cusco - Calca - Yanatile"
    },
    {
      "id": "080501",
      "text": "Cusco - Canas - Yanaoca"
    },
    {
      "id": "080502",
      "text": "Cusco - Canas - Checca"
    },
    {
      "id": "080503",
      "text": "Cusco - Canas - Kunturkanki"
    },
    {
      "id": "080504",
      "text": "Cusco - Canas - Langui"
    },
    {
      "id": "080505",
      "text": "Cusco - Canas - Layo"
    },
    {
      "id": "080506",
      "text": "Cusco - Canas - Pampamarca"
    },
    {
      "id": "080507",
      "text": "Cusco - Canas - Quehue"
    },
    {
      "id": "080508",
      "text": "Cusco - Canas - Tupac Amaru"
    },
    {
      "id": "080601",
      "text": "Cusco - Canchis - Sicuani"
    },
    {
      "id": "080602",
      "text": "Cusco - Canchis - Checacupe"
    },
    {
      "id": "080603",
      "text": "Cusco - Canchis - Combapata"
    },
    {
      "id": "080604",
      "text": "Cusco - Canchis - Marangani"
    },
    {
      "id": "080605",
      "text": "Cusco - Canchis - Pitumarca"
    },
    {
      "id": "080606",
      "text": "Cusco - Canchis - San Pablo"
    },
    {
      "id": "080607",
      "text": "Cusco - Canchis - San Pedro"
    },
    {
      "id": "080608",
      "text": "Cusco - Canchis - Tinta"
    },
    {
      "id": "080701",
      "text": "Cusco - Chumbivilcas - Santo Tomas"
    },
    {
      "id": "080702",
      "text": "Cusco - Chumbivilcas - Capacmarca"
    },
    {
      "id": "080703",
      "text": "Cusco - Chumbivilcas - Chamaca"
    },
    {
      "id": "080704",
      "text": "Cusco - Chumbivilcas - Colquemarca"
    },
    {
      "id": "080705",
      "text": "Cusco - Chumbivilcas - Livitaca"
    },
    {
      "id": "080706",
      "text": "Cusco - Chumbivilcas - Llusco"
    },
    {
      "id": "080707",
      "text": "Cusco - Chumbivilcas - Quiñota"
    },
    {
      "id": "080708",
      "text": "Cusco - Chumbivilcas - Velille"
    },
    {
      "id": "080801",
      "text": "Cusco - Espinar - Espinar"
    },
    {
      "id": "080802",
      "text": "Cusco - Espinar - Condoroma"
    },
    {
      "id": "080803",
      "text": "Cusco - Espinar - Coporaque"
    },
    {
      "id": "080804",
      "text": "Cusco - Espinar - Ocoruro"
    },
    {
      "id": "080805",
      "text": "Cusco - Espinar - Pallpata"
    },
    {
      "id": "080806",
      "text": "Cusco - Espinar - Pichigua"
    },
    {
      "id": "080807",
      "text": "Cusco - Espinar - Suyckutambo"
    },
    {
      "id": "080808",
      "text": "Cusco - Espinar - Alto Pichigua"
    },
    {
      "id": "080901",
      "text": "Cusco - La Convención - Santa Ana"
    },
    {
      "id": "080902",
      "text": "Cusco - La Convención - Echarate"
    },
    {
      "id": "080903",
      "text": "Cusco - La Convención - Huayopata"
    },
    {
      "id": "080904",
      "text": "Cusco - La Convención - Maranura"
    },
    {
      "id": "080905",
      "text": "Cusco - La Convención - Ocobamba"
    },
    {
      "id": "080906",
      "text": "Cusco - La Convención - Quellouno"
    },
    {
      "id": "080907",
      "text": "Cusco - La Convención - Kimbiri"
    },
    {
      "id": "080908",
      "text": "Cusco - La Convención - Santa Teresa"
    },
    {
      "id": "080909",
      "text": "Cusco - La Convención - Vilcabamba"
    },
    {
      "id": "080910",
      "text": "Cusco - La Convención - Pichari"
    },
    {
      "id": "080911",
      "text": "Cusco - La Convención - Inkawasi"
    },
    {
      "id": "080912",
      "text": "Cusco - La Convención - Villa Virgen"
    },
    {
      "id": "080913",
      "text": "Cusco - La Convención - Villa Kintiarina"
    },
    {
      "id": "080914",
      "text": "Cusco - La Convención - Megantoni"
    },
    {
      "id": "080915",
      "text": "Cusco - La Convención - Kumpirushiato"
    },
    {
      "id": "080916",
      "text": "Cusco - La Convención - Cielo Punco"
    },
    {
      "id": "080917",
      "text": "Cusco - La Convención - Manitea"
    },
    {
      "id": "081001",
      "text": "Cusco - Paruro - Paruro"
    },
    {
      "id": "081002",
      "text": "Cusco - Paruro - Accha"
    },
    {
      "id": "081003",
      "text": "Cusco - Paruro - Ccapi"
    },
    {
      "id": "081004",
      "text": "Cusco - Paruro - Colcha"
    },
    {
      "id": "081005",
      "text": "Cusco - Paruro - Huanoquite"
    },
    {
      "id": "081006",
      "text": "Cusco - Paruro - Omacha"
    },
    {
      "id": "081007",
      "text": "Cusco - Paruro - Paccaritambo"
    },
    {
      "id": "081008",
      "text": "Cusco - Paruro - Pillpinto"
    },
    {
      "id": "081009",
      "text": "Cusco - Paruro - Yaurisque"
    },
    {
      "id": "081101",
      "text": "Cusco - Paucartambo - Paucartambo"
    },
    {
      "id": "081102",
      "text": "Cusco - Paucartambo - Caicay"
    },
    {
      "id": "081103",
      "text": "Cusco - Paucartambo - Challabamba"
    },
    {
      "id": "081104",
      "text": "Cusco - Paucartambo - Colquepata"
    },
    {
      "id": "081105",
      "text": "Cusco - Paucartambo - Huancarani"
    },
    {
      "id": "081106",
      "text": "Cusco - Paucartambo - Kosñipata"
    },
    {
      "id": "081201",
      "text": "Cusco - Quispicanchi - Urcos"
    },
    {
      "id": "081202",
      "text": "Cusco - Quispicanchi - Andahuaylillas"
    },
    {
      "id": "081203",
      "text": "Cusco - Quispicanchi - Camanti"
    },
    {
      "id": "081204",
      "text": "Cusco - Quispicanchi - Ccarhuayo"
    },
    {
      "id": "081205",
      "text": "Cusco - Quispicanchi - Ccatca"
    },
    {
      "id": "081206",
      "text": "Cusco - Quispicanchi - Cusipata"
    },
    {
      "id": "081207",
      "text": "Cusco - Quispicanchi - Huaro"
    },
    {
      "id": "081208",
      "text": "Cusco - Quispicanchi - Lucre"
    },
    {
      "id": "081209",
      "text": "Cusco - Quispicanchi - Marcapata"
    },
    {
      "id": "081210",
      "text": "Cusco - Quispicanchi - Ocongate"
    },
    {
      "id": "081211",
      "text": "Cusco - Quispicanchi - Oropesa"
    },
    {
      "id": "081212",
      "text": "Cusco - Quispicanchi - Quiquijana"
    },
    {
      "id": "081301",
      "text": "Cusco - Urubamba - Urubamba"
    },
    {
      "id": "081302",
      "text": "Cusco - Urubamba - Chinchero"
    },
    {
      "id": "081303",
      "text": "Cusco - Urubamba - Huayllabamba"
    },
    {
      "id": "081304",
      "text": "Cusco - Urubamba - Machupicchu"
    },
    {
      "id": "081305",
      "text": "Cusco - Urubamba - Maras"
    },
    {
      "id": "081306",
      "text": "Cusco - Urubamba - Ollantaytambo"
    },
    {
      "id": "081307",
      "text": "Cusco - Urubamba - Yucay"
    },
    {
      "id": "090101",
      "text": "Huancavelica - Huancavelica - Huancavelica"
    },
    {
      "id": "090102",
      "text": "Huancavelica - Huancavelica - Acobambilla"
    },
    {
      "id": "090103",
      "text": "Huancavelica - Huancavelica - Acoria"
    },
    {
      "id": "090104",
      "text": "Huancavelica - Huancavelica - Conayca"
    },
    {
      "id": "090105",
      "text": "Huancavelica - Huancavelica - Cuenca"
    },
    {
      "id": "090106",
      "text": "Huancavelica - Huancavelica - Huachocolpa"
    },
    {
      "id": "090107",
      "text": "Huancavelica - Huancavelica - Huayllahuara"
    },
    {
      "id": "090108",
      "text": "Huancavelica - Huancavelica - Izcuchaca"
    },
    {
      "id": "090109",
      "text": "Huancavelica - Huancavelica - Laria"
    },
    {
      "id": "090110",
      "text": "Huancavelica - Huancavelica - Manta"
    },
    {
      "id": "090111",
      "text": "Huancavelica - Huancavelica - Mariscal Cáceres"
    },
    {
      "id": "090112",
      "text": "Huancavelica - Huancavelica - Moya"
    },
    {
      "id": "090113",
      "text": "Huancavelica - Huancavelica - Nuevo Occoro"
    },
    {
      "id": "090114",
      "text": "Huancavelica - Huancavelica - Palca"
    },
    {
      "id": "090115",
      "text": "Huancavelica - Huancavelica - Pilchaca"
    },
    {
      "id": "090116",
      "text": "Huancavelica - Huancavelica - Vilca"
    },
    {
      "id": "090117",
      "text": "Huancavelica - Huancavelica - Yauli"
    },
    {
      "id": "090118",
      "text": "Huancavelica - Huancavelica - Ascensión"
    },
    {
      "id": "090119",
      "text": "Huancavelica - Huancavelica - Huando"
    },
    {
      "id": "090201",
      "text": "Huancavelica - Acobamba - Acobamba"
    },
    {
      "id": "090202",
      "text": "Huancavelica - Acobamba - Andabamba"
    },
    {
      "id": "090203",
      "text": "Huancavelica - Acobamba - Anta"
    },
    {
      "id": "090204",
      "text": "Huancavelica - Acobamba - Caja"
    },
    {
      "id": "090205",
      "text": "Huancavelica - Acobamba - Marcas"
    },
    {
      "id": "090206",
      "text": "Huancavelica - Acobamba - Paucara"
    },
    {
      "id": "090207",
      "text": "Huancavelica - Acobamba - Pomacocha"
    },
    {
      "id": "090208",
      "text": "Huancavelica - Acobamba - Rosario"
    },
    {
      "id": "090301",
      "text": "Huancavelica - Angaraes - Lircay"
    },
    {
      "id": "090302",
      "text": "Huancavelica - Angaraes - Anchonga"
    },
    {
      "id": "090303",
      "text": "Huancavelica - Angaraes - Callanmarca"
    },
    {
      "id": "090304",
      "text": "Huancavelica - Angaraes - Ccochaccasa"
    },
    {
      "id": "090305",
      "text": "Huancavelica - Angaraes - Chincho"
    },
    {
      "id": "090306",
      "text": "Huancavelica - Angaraes - Congalla"
    },
    {
      "id": "090307",
      "text": "Huancavelica - Angaraes - Huanca-Huanca"
    },
    {
      "id": "090308",
      "text": "Huancavelica - Angaraes - Huayllay Grande"
    },
    {
      "id": "090309",
      "text": "Huancavelica - Angaraes - Julcamarca"
    },
    {
      "id": "090310",
      "text": "Huancavelica - Angaraes - San Antonio de Antaparco"
    },
    {
      "id": "090311",
      "text": "Huancavelica - Angaraes - Santo Tomas de Pata"
    },
    {
      "id": "090312",
      "text": "Huancavelica - Angaraes - Secclla"
    },
    {
      "id": "090401",
      "text": "Huancavelica - Castrovirreyna - Castrovirreyna"
    },
    {
      "id": "090402",
      "text": "Huancavelica - Castrovirreyna - Arma"
    },
    {
      "id": "090403",
      "text": "Huancavelica - Castrovirreyna - Aurahua"
    },
    {
      "id": "090404",
      "text": "Huancavelica - Castrovirreyna - Capillas"
    },
    {
      "id": "090405",
      "text": "Huancavelica - Castrovirreyna - Chupamarca"
    },
    {
      "id": "090406",
      "text": "Huancavelica - Castrovirreyna - Cocas"
    },
    {
      "id": "090407",
      "text": "Huancavelica - Castrovirreyna - Huachos"
    },
    {
      "id": "090408",
      "text": "Huancavelica - Castrovirreyna - Huamatambo"
    },
    {
      "id": "090409",
      "text": "Huancavelica - Castrovirreyna - Mollepampa"
    },
    {
      "id": "090410",
      "text": "Huancavelica - Castrovirreyna - San Juan"
    },
    {
      "id": "090411",
      "text": "Huancavelica - Castrovirreyna - Santa Ana"
    },
    {
      "id": "090412",
      "text": "Huancavelica - Castrovirreyna - Tantara"
    },
    {
      "id": "090413",
      "text": "Huancavelica - Castrovirreyna - Ticrapo"
    },
    {
      "id": "090501",
      "text": "Huancavelica - Churcampa - Churcampa"
    },
    {
      "id": "090502",
      "text": "Huancavelica - Churcampa - Anco"
    },
    {
      "id": "090503",
      "text": "Huancavelica - Churcampa - Chinchihuasi"
    },
    {
      "id": "090504",
      "text": "Huancavelica - Churcampa - El Carmen"
    },
    {
      "id": "090505",
      "text": "Huancavelica - Churcampa - La Merced"
    },
    {
      "id": "090506",
      "text": "Huancavelica - Churcampa - Locroja"
    },
    {
      "id": "090507",
      "text": "Huancavelica - Churcampa - Paucarbamba"
    },
    {
      "id": "090508",
      "text": "Huancavelica - Churcampa - San Miguel de Mayocc"
    },
    {
      "id": "090509",
      "text": "Huancavelica - Churcampa - San Pedro de Coris"
    },
    {
      "id": "090510",
      "text": "Huancavelica - Churcampa - Pachamarca"
    },
    {
      "id": "090511",
      "text": "Huancavelica - Churcampa - Cosme"
    },
    {
      "id": "090601",
      "text": "Huancavelica - Huaytará - Huaytara"
    },
    {
      "id": "090602",
      "text": "Huancavelica - Huaytará - Ayavi"
    },
    {
      "id": "090603",
      "text": "Huancavelica - Huaytará - Córdova"
    },
    {
      "id": "090604",
      "text": "Huancavelica - Huaytará - Huayacundo Arma"
    },
    {
      "id": "090605",
      "text": "Huancavelica - Huaytará - Laramarca"
    },
    {
      "id": "090606",
      "text": "Huancavelica - Huaytará - Ocoyo"
    },
    {
      "id": "090607",
      "text": "Huancavelica - Huaytará - Pilpichaca"
    },
    {
      "id": "090608",
      "text": "Huancavelica - Huaytará - Querco"
    },
    {
      "id": "090609",
      "text": "Huancavelica - Huaytará - Quito-Arma"
    },
    {
      "id": "090610",
      "text": "Huancavelica - Huaytará - San Antonio de Cusicancha"
    },
    {
      "id": "090611",
      "text": "Huancavelica - Huaytará - San Francisco de Sangayaico"
    },
    {
      "id": "090612",
      "text": "Huancavelica - Huaytará - San Isidro"
    },
    {
      "id": "090613",
      "text": "Huancavelica - Huaytará - Santiago de Chocorvos"
    },
    {
      "id": "090614",
      "text": "Huancavelica - Huaytará - Santiago de Quirahuara"
    },
    {
      "id": "090615",
      "text": "Huancavelica - Huaytará - Santo Domingo de Capillas"
    },
    {
      "id": "090616",
      "text": "Huancavelica - Huaytará - Tambo"
    },
    {
      "id": "090701",
      "text": "Huancavelica - Tayacaja - Pampas"
    },
    {
      "id": "090702",
      "text": "Huancavelica - Tayacaja - Acostambo"
    },
    {
      "id": "090703",
      "text": "Huancavelica - Tayacaja - Acraquia"
    },
    {
      "id": "090704",
      "text": "Huancavelica - Tayacaja - Ahuaycha"
    },
    {
      "id": "090705",
      "text": "Huancavelica - Tayacaja - Colcabamba"
    },
    {
      "id": "090706",
      "text": "Huancavelica - Tayacaja - Daniel Hernández"
    },
    {
      "id": "090707",
      "text": "Huancavelica - Tayacaja - Huachocolpa"
    },
    {
      "id": "090709",
      "text": "Huancavelica - Tayacaja - Huaribamba"
    },
    {
      "id": "090710",
      "text": "Huancavelica - Tayacaja - Ñahuimpuquio"
    },
    {
      "id": "090711",
      "text": "Huancavelica - Tayacaja - Pazos"
    },
    {
      "id": "090713",
      "text": "Huancavelica - Tayacaja - Quishuar"
    },
    {
      "id": "090714",
      "text": "Huancavelica - Tayacaja - Salcabamba"
    },
    {
      "id": "090715",
      "text": "Huancavelica - Tayacaja - Salcahuasi"
    },
    {
      "id": "090716",
      "text": "Huancavelica - Tayacaja - San Marcos de Rocchac"
    },
    {
      "id": "090717",
      "text": "Huancavelica - Tayacaja - Surcubamba"
    },
    {
      "id": "090718",
      "text": "Huancavelica - Tayacaja - Tintay Puncu"
    },
    {
      "id": "090719",
      "text": "Huancavelica - Tayacaja - Quichuas"
    },
    {
      "id": "090720",
      "text": "Huancavelica - Tayacaja - Andaymarca"
    },
    {
      "id": "090721",
      "text": "Huancavelica - Tayacaja - Roble"
    },
    {
      "id": "090722",
      "text": "Huancavelica - Tayacaja - Pichos"
    },
    {
      "id": "100101",
      "text": "Huánuco - Huánuco - Huanuco"
    },
    {
      "id": "100102",
      "text": "Huánuco - Huánuco - Amarilis"
    },
    {
      "id": "100103",
      "text": "Huánuco - Huánuco - Chinchao"
    },
    {
      "id": "100104",
      "text": "Huánuco - Huánuco - Churubamba"
    },
    {
      "id": "100105",
      "text": "Huánuco - Huánuco - Margos"
    },
    {
      "id": "100106",
      "text": "Huánuco - Huánuco - Quisqui (Kichki)"
    },
    {
      "id": "100107",
      "text": "Huánuco - Huánuco - San Francisco de Cayran"
    },
    {
      "id": "100108",
      "text": "Huánuco - Huánuco - San Pedro de Chaulan"
    },
    {
      "id": "100109",
      "text": "Huánuco - Huánuco - Santa María del Valle"
    },
    {
      "id": "100110",
      "text": "Huánuco - Huánuco - Yarumayo"
    },
    {
      "id": "100111",
      "text": "Huánuco - Huánuco - Pillco Marca"
    },
    {
      "id": "100112",
      "text": "Huánuco - Huánuco - Yacus"
    },
    {
      "id": "100113",
      "text": "Huánuco - Huánuco - San Pablo de Pillao"
    },
    {
      "id": "100201",
      "text": "Huánuco - Ambo - Ambo"
    },
    {
      "id": "100202",
      "text": "Huánuco - Ambo - Cayna"
    },
    {
      "id": "100203",
      "text": "Huánuco - Ambo - Colpas"
    },
    {
      "id": "100204",
      "text": "Huánuco - Ambo - Conchamarca"
    },
    {
      "id": "100205",
      "text": "Huánuco - Ambo - Huacar"
    },
    {
      "id": "100206",
      "text": "Huánuco - Ambo - San Francisco"
    },
    {
      "id": "100207",
      "text": "Huánuco - Ambo - San Rafael"
    },
    {
      "id": "100208",
      "text": "Huánuco - Ambo - Tomay Kichwa"
    },
    {
      "id": "100301",
      "text": "Huánuco - Dos de Mayo - La Unión"
    },
    {
      "id": "100307",
      "text": "Huánuco - Dos de Mayo - Chuquis"
    },
    {
      "id": "100311",
      "text": "Huánuco - Dos de Mayo - Marías"
    },
    {
      "id": "100313",
      "text": "Huánuco - Dos de Mayo - Pachas"
    },
    {
      "id": "100316",
      "text": "Huánuco - Dos de Mayo - Quivilla"
    },
    {
      "id": "100317",
      "text": "Huánuco - Dos de Mayo - Ripan"
    },
    {
      "id": "100321",
      "text": "Huánuco - Dos de Mayo - Shunqui"
    },
    {
      "id": "100322",
      "text": "Huánuco - Dos de Mayo - Sillapata"
    },
    {
      "id": "100323",
      "text": "Huánuco - Dos de Mayo - Yanas"
    },
    {
      "id": "100401",
      "text": "Huánuco - Huacaybamba - Huacaybamba"
    },
    {
      "id": "100402",
      "text": "Huánuco - Huacaybamba - Canchabamba"
    },
    {
      "id": "100403",
      "text": "Huánuco - Huacaybamba - Cochabamba"
    },
    {
      "id": "100404",
      "text": "Huánuco - Huacaybamba - Pinra"
    },
    {
      "id": "100501",
      "text": "Huánuco - Huamalíes - Llata"
    },
    {
      "id": "100502",
      "text": "Huánuco - Huamalíes - Arancay"
    },
    {
      "id": "100503",
      "text": "Huánuco - Huamalíes - Chavín de Pariarca"
    },
    {
      "id": "100504",
      "text": "Huánuco - Huamalíes - Jacas Grande"
    },
    {
      "id": "100505",
      "text": "Huánuco - Huamalíes - Jircan"
    },
    {
      "id": "100506",
      "text": "Huánuco - Huamalíes - Miraflores"
    },
    {
      "id": "100507",
      "text": "Huánuco - Huamalíes - Monzón"
    },
    {
      "id": "100508",
      "text": "Huánuco - Huamalíes - Punchao"
    },
    {
      "id": "100509",
      "text": "Huánuco - Huamalíes - Puños"
    },
    {
      "id": "100510",
      "text": "Huánuco - Huamalíes - Singa"
    },
    {
      "id": "100511",
      "text": "Huánuco - Huamalíes - Tantamayo"
    },
    {
      "id": "100601",
      "text": "Huánuco - Leoncio Prado - Rupa-Rupa"
    },
    {
      "id": "100602",
      "text": "Huánuco - Leoncio Prado - Daniel Alomía Robles"
    },
    {
      "id": "100603",
      "text": "Huánuco - Leoncio Prado - Hermílio Valdizan"
    },
    {
      "id": "100604",
      "text": "Huánuco - Leoncio Prado - José Crespo y Castillo"
    },
    {
      "id": "100605",
      "text": "Huánuco - Leoncio Prado - Luyando"
    },
    {
      "id": "100606",
      "text": "Huánuco - Leoncio Prado - Mariano Damaso Beraun"
    },
    {
      "id": "100607",
      "text": "Huánuco - Leoncio Prado - Pucayacu"
    },
    {
      "id": "100608",
      "text": "Huánuco - Leoncio Prado - Castillo Grande"
    },
    {
      "id": "100701",
      "text": "Huánuco - Marañón - Huacrachuco"
    },
    {
      "id": "100702",
      "text": "Huánuco - Marañón - Cholon"
    },
    {
      "id": "100703",
      "text": "Huánuco - Marañón - San Buenaventura"
    },
    {
      "id": "100704",
      "text": "Huánuco - Marañón - La Morada"
    },
    {
      "id": "100705",
      "text": "Huánuco - Marañón - Santa Rosa de Alto Yanajanca"
    },
    {
      "id": "100801",
      "text": "Huánuco - Pachitea - Panao"
    },
    {
      "id": "100802",
      "text": "Huánuco - Pachitea - Chaglla"
    },
    {
      "id": "100803",
      "text": "Huánuco - Pachitea - Molino"
    },
    {
      "id": "100804",
      "text": "Huánuco - Pachitea - Umari"
    },
    {
      "id": "100901",
      "text": "Huánuco - Puerto Inca - Puerto Inca"
    },
    {
      "id": "100902",
      "text": "Huánuco - Puerto Inca - Codo del Pozuzo"
    },
    {
      "id": "100903",
      "text": "Huánuco - Puerto Inca - Honoria"
    },
    {
      "id": "100904",
      "text": "Huánuco - Puerto Inca - Tournavista"
    },
    {
      "id": "100905",
      "text": "Huánuco - Puerto Inca - Yuyapichis"
    },
    {
      "id": "101001",
      "text": "Huánuco - Lauricocha - Jesús"
    },
    {
      "id": "101002",
      "text": "Huánuco - Lauricocha - Baños"
    },
    {
      "id": "101003",
      "text": "Huánuco - Lauricocha - Jivia"
    },
    {
      "id": "101004",
      "text": "Huánuco - Lauricocha - Queropalca"
    },
    {
      "id": "101005",
      "text": "Huánuco - Lauricocha - Rondos"
    },
    {
      "id": "101006",
      "text": "Huánuco - Lauricocha - San Francisco de Asís"
    },
    {
      "id": "101007",
      "text": "Huánuco - Lauricocha - San Miguel de Cauri"
    },
    {
      "id": "101101",
      "text": "Huánuco - Yarowilca - Chavinillo"
    },
    {
      "id": "101102",
      "text": "Huánuco - Yarowilca - Cahuac"
    },
    {
      "id": "101103",
      "text": "Huánuco - Yarowilca - Chacabamba"
    },
    {
      "id": "101104",
      "text": "Huánuco - Yarowilca - Aparicio Pomares"
    },
    {
      "id": "101105",
      "text": "Huánuco - Yarowilca - Jacas Chico"
    },
    {
      "id": "101106",
      "text": "Huánuco - Yarowilca - Obas"
    },
    {
      "id": "101107",
      "text": "Huánuco - Yarowilca - Pampamarca"
    },
    {
      "id": "101108",
      "text": "Huánuco - Yarowilca - Choras"
    },
    {
      "id": "110101",
      "text": "Ica - Ica - Ica"
    },
    {
      "id": "110102",
      "text": "Ica - Ica - La Tinguiña"
    },
    {
      "id": "110103",
      "text": "Ica - Ica - Los Aquijes"
    },
    {
      "id": "110104",
      "text": "Ica - Ica - Ocucaje"
    },
    {
      "id": "110105",
      "text": "Ica - Ica - Pachacutec"
    },
    {
      "id": "110106",
      "text": "Ica - Ica - Parcona"
    },
    {
      "id": "110107",
      "text": "Ica - Ica - Pueblo Nuevo"
    },
    {
      "id": "110108",
      "text": "Ica - Ica - Salas"
    },
    {
      "id": "110109",
      "text": "Ica - Ica - San José de Los Molinos"
    },
    {
      "id": "110110",
      "text": "Ica - Ica - San Juan Bautista"
    },
    {
      "id": "110111",
      "text": "Ica - Ica - Santiago"
    },
    {
      "id": "110112",
      "text": "Ica - Ica - Subtanjalla"
    },
    {
      "id": "110113",
      "text": "Ica - Ica - Tate"
    },
    {
      "id": "110114",
      "text": "Ica - Ica - Yauca del Rosario"
    },
    {
      "id": "110201",
      "text": "Ica - Chincha - Chincha Alta"
    },
    {
      "id": "110202",
      "text": "Ica - Chincha - Alto Laran"
    },
    {
      "id": "110203",
      "text": "Ica - Chincha - Chavin"
    },
    {
      "id": "110204",
      "text": "Ica - Chincha - Chincha Baja"
    },
    {
      "id": "110205",
      "text": "Ica - Chincha - El Carmen"
    },
    {
      "id": "110206",
      "text": "Ica - Chincha - Grocio Prado"
    },
    {
      "id": "110207",
      "text": "Ica - Chincha - Pueblo Nuevo"
    },
    {
      "id": "110208",
      "text": "Ica - Chincha - San Juan de Yanac"
    },
    {
      "id": "110209",
      "text": "Ica - Chincha - San Pedro de Huacarpana"
    },
    {
      "id": "110210",
      "text": "Ica - Chincha - Sunampe"
    },
    {
      "id": "110211",
      "text": "Ica - Chincha - Tambo de Mora"
    },
    {
      "id": "110301",
      "text": "Ica - Nasca - Nasca"
    },
    {
      "id": "110302",
      "text": "Ica - Nasca - Changuillo"
    },
    {
      "id": "110303",
      "text": "Ica - Nasca - El Ingenio"
    },
    {
      "id": "110304",
      "text": "Ica - Nasca - Marcona"
    },
    {
      "id": "110305",
      "text": "Ica - Nasca - Vista Alegre"
    },
    {
      "id": "110401",
      "text": "Ica - Palpa - Palpa"
    },
    {
      "id": "110402",
      "text": "Ica - Palpa - Llipata"
    },
    {
      "id": "110403",
      "text": "Ica - Palpa - Río Grande"
    },
    {
      "id": "110404",
      "text": "Ica - Palpa - Santa Cruz"
    },
    {
      "id": "110405",
      "text": "Ica - Palpa - Tibillo"
    },
    {
      "id": "110501",
      "text": "Ica - Pisco - Pisco"
    },
    {
      "id": "110502",
      "text": "Ica - Pisco - Huancano"
    },
    {
      "id": "110503",
      "text": "Ica - Pisco - Humay"
    },
    {
      "id": "110504",
      "text": "Ica - Pisco - Independencia"
    },
    {
      "id": "110505",
      "text": "Ica - Pisco - Paracas"
    },
    {
      "id": "110506",
      "text": "Ica - Pisco - San Andrés"
    },
    {
      "id": "110507",
      "text": "Ica - Pisco - San Clemente"
    },
    {
      "id": "110508",
      "text": "Ica - Pisco - Tupac Amaru Inca"
    },
    {
      "id": "120101",
      "text": "Junín - Huancayo - Huancayo"
    },
    {
      "id": "120104",
      "text": "Junín - Huancayo - Carhuacallanga"
    },
    {
      "id": "120105",
      "text": "Junín - Huancayo - Chacapampa"
    },
    {
      "id": "120106",
      "text": "Junín - Huancayo - Chicche"
    },
    {
      "id": "120107",
      "text": "Junín - Huancayo - Chilca"
    },
    {
      "id": "120108",
      "text": "Junín - Huancayo - Chongos Alto"
    },
    {
      "id": "120111",
      "text": "Junín - Huancayo - Chupuro"
    },
    {
      "id": "120112",
      "text": "Junín - Huancayo - Colca"
    },
    {
      "id": "120113",
      "text": "Junín - Huancayo - Cullhuas"
    },
    {
      "id": "120114",
      "text": "Junín - Huancayo - El Tambo"
    },
    {
      "id": "120116",
      "text": "Junín - Huancayo - Huacrapuquio"
    },
    {
      "id": "120117",
      "text": "Junín - Huancayo - Hualhuas"
    },
    {
      "id": "120119",
      "text": "Junín - Huancayo - Huancan"
    },
    {
      "id": "120120",
      "text": "Junín - Huancayo - Huasicancha"
    },
    {
      "id": "120121",
      "text": "Junín - Huancayo - Huayucachi"
    },
    {
      "id": "120122",
      "text": "Junín - Huancayo - Ingenio"
    },
    {
      "id": "120124",
      "text": "Junín - Huancayo - Pariahuanca"
    },
    {
      "id": "120125",
      "text": "Junín - Huancayo - Pilcomayo"
    },
    {
      "id": "120126",
      "text": "Junín - Huancayo - Pucara"
    },
    {
      "id": "120127",
      "text": "Junín - Huancayo - Quichuay"
    },
    {
      "id": "120128",
      "text": "Junín - Huancayo - Quilcas"
    },
    {
      "id": "120129",
      "text": "Junín - Huancayo - San Agustín"
    },
    {
      "id": "120130",
      "text": "Junín - Huancayo - San Jerónimo de Tunan"
    },
    {
      "id": "120132",
      "text": "Junín - Huancayo - Saño"
    },
    {
      "id": "120133",
      "text": "Junín - Huancayo - Sapallanga"
    },
    {
      "id": "120134",
      "text": "Junín - Huancayo - Sicaya"
    },
    {
      "id": "120135",
      "text": "Junín - Huancayo - Santo Domingo de Acobamba"
    },
    {
      "id": "120136",
      "text": "Junín - Huancayo - Viques"
    },
    {
      "id": "120201",
      "text": "Junín - Concepción - Concepción"
    },
    {
      "id": "120202",
      "text": "Junín - Concepción - Aco"
    },
    {
      "id": "120203",
      "text": "Junín - Concepción - Andamarca"
    },
    {
      "id": "120204",
      "text": "Junín - Concepción - Chambara"
    },
    {
      "id": "120205",
      "text": "Junín - Concepción - Cochas"
    },
    {
      "id": "120206",
      "text": "Junín - Concepción - Comas"
    },
    {
      "id": "120207",
      "text": "Junín - Concepción - Heroínas Toledo"
    },
    {
      "id": "120208",
      "text": "Junín - Concepción - Manzanares"
    },
    {
      "id": "120209",
      "text": "Junín - Concepción - Mariscal Castilla"
    },
    {
      "id": "120210",
      "text": "Junín - Concepción - Matahuasi"
    },
    {
      "id": "120211",
      "text": "Junín - Concepción - Mito"
    },
    {
      "id": "120212",
      "text": "Junín - Concepción - Nueve de Julio"
    },
    {
      "id": "120213",
      "text": "Junín - Concepción - Orcotuna"
    },
    {
      "id": "120214",
      "text": "Junín - Concepción - San José de Quero"
    },
    {
      "id": "120215",
      "text": "Junín - Concepción - Santa Rosa de Ocopa"
    },
    {
      "id": "120301",
      "text": "Junín - Chanchamayo - Chanchamayo"
    },
    {
      "id": "120302",
      "text": "Junín - Chanchamayo - Perene"
    },
    {
      "id": "120303",
      "text": "Junín - Chanchamayo - Pichanaqui"
    },
    {
      "id": "120304",
      "text": "Junín - Chanchamayo - San Luis de Shuaro"
    },
    {
      "id": "120305",
      "text": "Junín - Chanchamayo - San Ramón"
    },
    {
      "id": "120306",
      "text": "Junín - Chanchamayo - Vitoc"
    },
    {
      "id": "120401",
      "text": "Junín - Jauja - Jauja"
    },
    {
      "id": "120402",
      "text": "Junín - Jauja - Acolla"
    },
    {
      "id": "120403",
      "text": "Junín - Jauja - Apata"
    },
    {
      "id": "120404",
      "text": "Junín - Jauja - Ataura"
    },
    {
      "id": "120405",
      "text": "Junín - Jauja - Canchayllo"
    },
    {
      "id": "120406",
      "text": "Junín - Jauja - Curicaca"
    },
    {
      "id": "120407",
      "text": "Junín - Jauja - El Mantaro"
    },
    {
      "id": "120408",
      "text": "Junín - Jauja - Huamali"
    },
    {
      "id": "120409",
      "text": "Junín - Jauja - Huaripampa"
    },
    {
      "id": "120410",
      "text": "Junín - Jauja - Huertas"
    },
    {
      "id": "120411",
      "text": "Junín - Jauja - Janjaillo"
    },
    {
      "id": "120412",
      "text": "Junín - Jauja - Julcán"
    },
    {
      "id": "120413",
      "text": "Junín - Jauja - Leonor Ordóñez"
    },
    {
      "id": "120414",
      "text": "Junín - Jauja - Llocllapampa"
    },
    {
      "id": "120415",
      "text": "Junín - Jauja - Marco"
    },
    {
      "id": "120416",
      "text": "Junín - Jauja - Masma"
    },
    {
      "id": "120417",
      "text": "Junín - Jauja - Masma Chicche"
    },
    {
      "id": "120418",
      "text": "Junín - Jauja - Molinos"
    },
    {
      "id": "120419",
      "text": "Junín - Jauja - Monobamba"
    },
    {
      "id": "120420",
      "text": "Junín - Jauja - Muqui"
    },
    {
      "id": "120421",
      "text": "Junín - Jauja - Muquiyauyo"
    },
    {
      "id": "120422",
      "text": "Junín - Jauja - Paca"
    },
    {
      "id": "120423",
      "text": "Junín - Jauja - Paccha"
    },
    {
      "id": "120424",
      "text": "Junín - Jauja - Pancan"
    },
    {
      "id": "120425",
      "text": "Junín - Jauja - Parco"
    },
    {
      "id": "120426",
      "text": "Junín - Jauja - Pomacancha"
    },
    {
      "id": "120427",
      "text": "Junín - Jauja - Ricran"
    },
    {
      "id": "120428",
      "text": "Junín - Jauja - San Lorenzo"
    },
    {
      "id": "120429",
      "text": "Junín - Jauja - San Pedro de Chunan"
    },
    {
      "id": "120430",
      "text": "Junín - Jauja - Sausa"
    },
    {
      "id": "120431",
      "text": "Junín - Jauja - Sincos"
    },
    {
      "id": "120432",
      "text": "Junín - Jauja - Tunan Marca"
    },
    {
      "id": "120433",
      "text": "Junín - Jauja - Yauli"
    },
    {
      "id": "120434",
      "text": "Junín - Jauja - Yauyos"
    },
    {
      "id": "120501",
      "text": "Junín - Junín - Junin"
    },
    {
      "id": "120502",
      "text": "Junín - Junín - Carhuamayo"
    },
    {
      "id": "120503",
      "text": "Junín - Junín - Ondores"
    },
    {
      "id": "120504",
      "text": "Junín - Junín - Ulcumayo"
    },
    {
      "id": "120601",
      "text": "Junín - Satipo - Satipo"
    },
    {
      "id": "120602",
      "text": "Junín - Satipo - Coviriali"
    },
    {
      "id": "120603",
      "text": "Junín - Satipo - Llaylla"
    },
    {
      "id": "120604",
      "text": "Junín - Satipo - Mazamari"
    },
    {
      "id": "120605",
      "text": "Junín - Satipo - Pampa Hermosa"
    },
    {
      "id": "120606",
      "text": "Junín - Satipo - Pangoa"
    },
    {
      "id": "120607",
      "text": "Junín - Satipo - Río Negro"
    },
    {
      "id": "120608",
      "text": "Junín - Satipo - Río Tambo"
    },
    {
      "id": "120609",
      "text": "Junín - Satipo - Vizcatan del Ene"
    },
    {
      "id": "120701",
      "text": "Junín - Tarma - Tarma"
    },
    {
      "id": "120702",
      "text": "Junín - Tarma - Acobamba"
    },
    {
      "id": "120703",
      "text": "Junín - Tarma - Huaricolca"
    },
    {
      "id": "120704",
      "text": "Junín - Tarma - Huasahuasi"
    },
    {
      "id": "120705",
      "text": "Junín - Tarma - La Unión"
    },
    {
      "id": "120706",
      "text": "Junín - Tarma - Palca"
    },
    {
      "id": "120707",
      "text": "Junín - Tarma - Palcamayo"
    },
    {
      "id": "120708",
      "text": "Junín - Tarma - San Pedro de Cajas"
    },
    {
      "id": "120709",
      "text": "Junín - Tarma - Tapo"
    },
    {
      "id": "120801",
      "text": "Junín - Yauli - La Oroya"
    },
    {
      "id": "120802",
      "text": "Junín - Yauli - Chacapalpa"
    },
    {
      "id": "120803",
      "text": "Junín - Yauli - Huay-Huay"
    },
    {
      "id": "120804",
      "text": "Junín - Yauli - Marcapomacocha"
    },
    {
      "id": "120805",
      "text": "Junín - Yauli - Morococha"
    },
    {
      "id": "120806",
      "text": "Junín - Yauli - Paccha"
    },
    {
      "id": "120807",
      "text": "Junín - Yauli - Santa Bárbara de Carhuacayan"
    },
    {
      "id": "120808",
      "text": "Junín - Yauli - Santa Rosa de Sacco"
    },
    {
      "id": "120809",
      "text": "Junín - Yauli - Suitucancha"
    },
    {
      "id": "120810",
      "text": "Junín - Yauli - Yauli"
    },
    {
      "id": "120901",
      "text": "Junín - Chupaca - Chupaca"
    },
    {
      "id": "120902",
      "text": "Junín - Chupaca - Ahuac"
    },
    {
      "id": "120903",
      "text": "Junín - Chupaca - Chongos Bajo"
    },
    {
      "id": "120904",
      "text": "Junín - Chupaca - Huachac"
    },
    {
      "id": "120905",
      "text": "Junín - Chupaca - Huamancaca Chico"
    },
    {
      "id": "120906",
      "text": "Junín - Chupaca - San Juan de Iscos"
    },
    {
      "id": "120907",
      "text": "Junín - Chupaca - San Juan de Jarpa"
    },
    {
      "id": "120908",
      "text": "Junín - Chupaca - Tres de Diciembre"
    },
    {
      "id": "120909",
      "text": "Junín - Chupaca - Yanacancha"
    },
    {
      "id": "130101",
      "text": "La Libertad - Trujillo - Trujillo"
    },
    {
      "id": "130102",
      "text": "La Libertad - Trujillo - El Porvenir"
    },
    {
      "id": "130103",
      "text": "La Libertad - Trujillo - Florencia de Mora"
    },
    {
      "id": "130104",
      "text": "La Libertad - Trujillo - Huanchaco"
    },
    {
      "id": "130105",
      "text": "La Libertad - Trujillo - La Esperanza"
    },
    {
      "id": "130106",
      "text": "La Libertad - Trujillo - Laredo"
    },
    {
      "id": "130107",
      "text": "La Libertad - Trujillo - Moche"
    },
    {
      "id": "130108",
      "text": "La Libertad - Trujillo - Poroto"
    },
    {
      "id": "130109",
      "text": "La Libertad - Trujillo - Salaverry"
    },
    {
      "id": "130110",
      "text": "La Libertad - Trujillo - Simbal"
    },
    {
      "id": "130111",
      "text": "La Libertad - Trujillo - Victor Larco Herrera"
    },
    {
      "id": "130201",
      "text": "La Libertad - Ascope - Ascope"
    },
    {
      "id": "130202",
      "text": "La Libertad - Ascope - Chicama"
    },
    {
      "id": "130203",
      "text": "La Libertad - Ascope - Chocope"
    },
    {
      "id": "130204",
      "text": "La Libertad - Ascope - Magdalena de Cao"
    },
    {
      "id": "130205",
      "text": "La Libertad - Ascope - Paijan"
    },
    {
      "id": "130206",
      "text": "La Libertad - Ascope - Rázuri"
    },
    {
      "id": "130207",
      "text": "La Libertad - Ascope - Santiago de Cao"
    },
    {
      "id": "130208",
      "text": "La Libertad - Ascope - Casa Grande"
    },
    {
      "id": "130301",
      "text": "La Libertad - Bolívar - Bolívar"
    },
    {
      "id": "130302",
      "text": "La Libertad - Bolívar - Bambamarca"
    },
    {
      "id": "130303",
      "text": "La Libertad - Bolívar - Condormarca"
    },
    {
      "id": "130304",
      "text": "La Libertad - Bolívar - Longotea"
    },
    {
      "id": "130305",
      "text": "La Libertad - Bolívar - Uchumarca"
    },
    {
      "id": "130306",
      "text": "La Libertad - Bolívar - Ucuncha"
    },
    {
      "id": "130401",
      "text": "La Libertad - Chepén - Chepen"
    },
    {
      "id": "130402",
      "text": "La Libertad - Chepén - Pacanga"
    },
    {
      "id": "130403",
      "text": "La Libertad - Chepén - Pueblo Nuevo"
    },
    {
      "id": "130501",
      "text": "La Libertad - Julcán - Julcan"
    },
    {
      "id": "130502",
      "text": "La Libertad - Julcán - Calamarca"
    },
    {
      "id": "130503",
      "text": "La Libertad - Julcán - Carabamba"
    },
    {
      "id": "130504",
      "text": "La Libertad - Julcán - Huaso"
    },
    {
      "id": "130601",
      "text": "La Libertad - Otuzco - Otuzco"
    },
    {
      "id": "130602",
      "text": "La Libertad - Otuzco - Agallpampa"
    },
    {
      "id": "130604",
      "text": "La Libertad - Otuzco - Charat"
    },
    {
      "id": "130605",
      "text": "La Libertad - Otuzco - Huaranchal"
    },
    {
      "id": "130606",
      "text": "La Libertad - Otuzco - La Cuesta"
    },
    {
      "id": "130608",
      "text": "La Libertad - Otuzco - Mache"
    },
    {
      "id": "130610",
      "text": "La Libertad - Otuzco - Paranday"
    },
    {
      "id": "130611",
      "text": "La Libertad - Otuzco - Salpo"
    },
    {
      "id": "130613",
      "text": "La Libertad - Otuzco - Sinsicap"
    },
    {
      "id": "130614",
      "text": "La Libertad - Otuzco - Usquil"
    },
    {
      "id": "130701",
      "text": "La Libertad - Pacasmayo - San Pedro de Lloc"
    },
    {
      "id": "130702",
      "text": "La Libertad - Pacasmayo - Guadalupe"
    },
    {
      "id": "130703",
      "text": "La Libertad - Pacasmayo - Jequetepeque"
    },
    {
      "id": "130704",
      "text": "La Libertad - Pacasmayo - Pacasmayo"
    },
    {
      "id": "130705",
      "text": "La Libertad - Pacasmayo - San José"
    },
    {
      "id": "130801",
      "text": "La Libertad - Pataz - Tayabamba"
    },
    {
      "id": "130802",
      "text": "La Libertad - Pataz - Buldibuyo"
    },
    {
      "id": "130803",
      "text": "La Libertad - Pataz - Chillia"
    },
    {
      "id": "130804",
      "text": "La Libertad - Pataz - Huancaspata"
    },
    {
      "id": "130805",
      "text": "La Libertad - Pataz - Huaylillas"
    },
    {
      "id": "130806",
      "text": "La Libertad - Pataz - Huayo"
    },
    {
      "id": "130807",
      "text": "La Libertad - Pataz - Ongon"
    },
    {
      "id": "130808",
      "text": "La Libertad - Pataz - Parcoy"
    },
    {
      "id": "130809",
      "text": "La Libertad - Pataz - Pataz"
    },
    {
      "id": "130810",
      "text": "La Libertad - Pataz - Pias"
    },
    {
      "id": "130811",
      "text": "La Libertad - Pataz - Santiago de Challas"
    },
    {
      "id": "130812",
      "text": "La Libertad - Pataz - Taurija"
    },
    {
      "id": "130813",
      "text": "La Libertad - Pataz - Urpay"
    },
    {
      "id": "130901",
      "text": "La Libertad - Sánchez Carrión - Huamachuco"
    },
    {
      "id": "130902",
      "text": "La Libertad - Sánchez Carrión - Chugay"
    },
    {
      "id": "130903",
      "text": "La Libertad - Sánchez Carrión - Cochorco"
    },
    {
      "id": "130904",
      "text": "La Libertad - Sánchez Carrión - Curgos"
    },
    {
      "id": "130905",
      "text": "La Libertad - Sánchez Carrión - Marcabal"
    },
    {
      "id": "130906",
      "text": "La Libertad - Sánchez Carrión - Sanagoran"
    },
    {
      "id": "130907",
      "text": "La Libertad - Sánchez Carrión - Sarin"
    },
    {
      "id": "130908",
      "text": "La Libertad - Sánchez Carrión - Sartimbamba"
    },
    {
      "id": "131001",
      "text": "La Libertad - Santiago de Chuco - Santiago de Chuco"
    },
    {
      "id": "131002",
      "text": "La Libertad - Santiago de Chuco - Angasmarca"
    },
    {
      "id": "131003",
      "text": "La Libertad - Santiago de Chuco - Cachicadan"
    },
    {
      "id": "131004",
      "text": "La Libertad - Santiago de Chuco - Mollebamba"
    },
    {
      "id": "131005",
      "text": "La Libertad - Santiago de Chuco - Mollepata"
    },
    {
      "id": "131006",
      "text": "La Libertad - Santiago de Chuco - Quiruvilca"
    },
    {
      "id": "131007",
      "text": "La Libertad - Santiago de Chuco - Santa Cruz de Chuca"
    },
    {
      "id": "131008",
      "text": "La Libertad - Santiago de Chuco - Sitabamba"
    },
    {
      "id": "131101",
      "text": "La Libertad - Gran Chimú - Cascas"
    },
    {
      "id": "131102",
      "text": "La Libertad - Gran Chimú - Lucma"
    },
    {
      "id": "131103",
      "text": "La Libertad - Gran Chimú - Marmot"
    },
    {
      "id": "131104",
      "text": "La Libertad - Gran Chimú - Sayapullo"
    },
    {
      "id": "131201",
      "text": "La Libertad - Virú - Viru"
    },
    {
      "id": "131202",
      "text": "La Libertad - Virú - Chao"
    },
    {
      "id": "131203",
      "text": "La Libertad - Virú - Guadalupito"
    },
    {
      "id": "140101",
      "text": "Lambayeque - Chiclayo - Chiclayo"
    },
    {
      "id": "140102",
      "text": "Lambayeque - Chiclayo - Chongoyape"
    },
    {
      "id": "140103",
      "text": "Lambayeque - Chiclayo - Eten"
    },
    {
      "id": "140104",
      "text": "Lambayeque - Chiclayo - Eten Puerto"
    },
    {
      "id": "140105",
      "text": "Lambayeque - Chiclayo - José Leonardo Ortiz"
    },
    {
      "id": "140106",
      "text": "Lambayeque - Chiclayo - La Victoria"
    },
    {
      "id": "140107",
      "text": "Lambayeque - Chiclayo - Lagunas"
    },
    {
      "id": "140108",
      "text": "Lambayeque - Chiclayo - Monsefu"
    },
    {
      "id": "140109",
      "text": "Lambayeque - Chiclayo - Nueva Arica"
    },
    {
      "id": "140110",
      "text": "Lambayeque - Chiclayo - Oyotun"
    },
    {
      "id": "140111",
      "text": "Lambayeque - Chiclayo - Picsi"
    },
    {
      "id": "140112",
      "text": "Lambayeque - Chiclayo - Pimentel"
    },
    {
      "id": "140113",
      "text": "Lambayeque - Chiclayo - Reque"
    },
    {
      "id": "140114",
      "text": "Lambayeque - Chiclayo - Santa Rosa"
    },
    {
      "id": "140115",
      "text": "Lambayeque - Chiclayo - Saña"
    },
    {
      "id": "140116",
      "text": "Lambayeque - Chiclayo - Cayalti"
    },
    {
      "id": "140117",
      "text": "Lambayeque - Chiclayo - Patapo"
    },
    {
      "id": "140118",
      "text": "Lambayeque - Chiclayo - Pomalca"
    },
    {
      "id": "140119",
      "text": "Lambayeque - Chiclayo - Pucala"
    },
    {
      "id": "140120",
      "text": "Lambayeque - Chiclayo - Tuman"
    },
    {
      "id": "140201",
      "text": "Lambayeque - Ferreñafe - Ferreñafe"
    },
    {
      "id": "140202",
      "text": "Lambayeque - Ferreñafe - Cañaris"
    },
    {
      "id": "140203",
      "text": "Lambayeque - Ferreñafe - Incahuasi"
    },
    {
      "id": "140204",
      "text": "Lambayeque - Ferreñafe - Manuel Antonio Mesones Muro"
    },
    {
      "id": "140205",
      "text": "Lambayeque - Ferreñafe - Pitipo"
    },
    {
      "id": "140206",
      "text": "Lambayeque - Ferreñafe - Pueblo Nuevo"
    },
    {
      "id": "140301",
      "text": "Lambayeque - Lambayeque - Lambayeque"
    },
    {
      "id": "140302",
      "text": "Lambayeque - Lambayeque - Chochope"
    },
    {
      "id": "140303",
      "text": "Lambayeque - Lambayeque - Illimo"
    },
    {
      "id": "140304",
      "text": "Lambayeque - Lambayeque - Jayanca"
    },
    {
      "id": "140305",
      "text": "Lambayeque - Lambayeque - Mochumi"
    },
    {
      "id": "140306",
      "text": "Lambayeque - Lambayeque - Morrope"
    },
    {
      "id": "140307",
      "text": "Lambayeque - Lambayeque - Motupe"
    },
    {
      "id": "140308",
      "text": "Lambayeque - Lambayeque - Olmos"
    },
    {
      "id": "140309",
      "text": "Lambayeque - Lambayeque - Pacora"
    },
    {
      "id": "140310",
      "text": "Lambayeque - Lambayeque - Salas"
    },
    {
      "id": "140311",
      "text": "Lambayeque - Lambayeque - San José"
    },
    {
      "id": "140312",
      "text": "Lambayeque - Lambayeque - Tucume"
    },
    {
      "id": "150101",
      "text": "Lima - Lima - Lima"
    },
    {
      "id": "150102",
      "text": "Lima - Lima - Ancón"
    },
    {
      "id": "150103",
      "text": "Lima - Lima - Ate"
    },
    {
      "id": "150104",
      "text": "Lima - Lima - Barranco"
    },
    {
      "id": "150105",
      "text": "Lima - Lima - Breña"
    },
    {
      "id": "150106",
      "text": "Lima - Lima - Carabayllo"
    },
    {
      "id": "150107",
      "text": "Lima - Lima - Chaclacayo"
    },
    {
      "id": "150108",
      "text": "Lima - Lima - Chorrillos"
    },
    {
      "id": "150109",
      "text": "Lima - Lima - Cieneguilla"
    },
    {
      "id": "150110",
      "text": "Lima - Lima - Comas"
    },
    {
      "id": "150111",
      "text": "Lima - Lima - El Agustino"
    },
    {
      "id": "150112",
      "text": "Lima - Lima - Independencia"
    },
    {
      "id": "150113",
      "text": "Lima - Lima - Jesús María"
    },
    {
      "id": "150114",
      "text": "Lima - Lima - La Molina"
    },
    {
      "id": "150115",
      "text": "Lima - Lima - La Victoria"
    },
    {
      "id": "150116",
      "text": "Lima - Lima - Lince"
    },
    {
      "id": "150117",
      "text": "Lima - Lima - Los Olivos"
    },
    {
      "id": "150118",
      "text": "Lima - Lima - Lurigancho"
    },
    {
      "id": "150119",
      "text": "Lima - Lima - Lurin"
    },
    {
      "id": "150120",
      "text": "Lima - Lima - Magdalena del Mar"
    },
    {
      "id": "150121",
      "text": "Lima - Lima - Pueblo Libre"
    },
    {
      "id": "150122",
      "text": "Lima - Lima - Miraflores"
    },
    {
      "id": "150123",
      "text": "Lima - Lima - Pachacamac"
    },
    {
      "id": "150124",
      "text": "Lima - Lima - Pucusana"
    },
    {
      "id": "150125",
      "text": "Lima - Lima - Puente Piedra"
    },
    {
      "id": "150126",
      "text": "Lima - Lima - Punta Hermosa"
    },
    {
      "id": "150127",
      "text": "Lima - Lima - Punta Negra"
    },
    {
      "id": "150128",
      "text": "Lima - Lima - Rímac"
    },
    {
      "id": "150129",
      "text": "Lima - Lima - San Bartolo"
    },
    {
      "id": "150130",
      "text": "Lima - Lima - San Borja"
    },
    {
      "id": "150131",
      "text": "Lima - Lima - San Isidro"
    },
    {
      "id": "150132",
      "text": "Lima - Lima - San Juan de Lurigancho"
    },
    {
      "id": "150133",
      "text": "Lima - Lima - San Juan de Miraflores"
    },
    {
      "id": "150134",
      "text": "Lima - Lima - San Luis"
    },
    {
      "id": "150135",
      "text": "Lima - Lima - San Martín de Porres"
    },
    {
      "id": "150136",
      "text": "Lima - Lima - San Miguel"
    },
    {
      "id": "150137",
      "text": "Lima - Lima - Santa Anita"
    },
    {
      "id": "150138",
      "text": "Lima - Lima - Santa María del Mar"
    },
    {
      "id": "150139",
      "text": "Lima - Lima - Santa Rosa"
    },
    {
      "id": "150140",
      "text": "Lima - Lima - Santiago de Surco"
    },
    {
      "id": "150141",
      "text": "Lima - Lima - Surquillo"
    },
    {
      "id": "150142",
      "text": "Lima - Lima - Villa El Salvador"
    },
    {
      "id": "150143",
      "text": "Lima - Lima - Villa María del Triunfo"
    },
    {
      "id": "150201",
      "text": "Lima - Barranca - Barranca"
    },
    {
      "id": "150202",
      "text": "Lima - Barranca - Paramonga"
    },
    {
      "id": "150203",
      "text": "Lima - Barranca - Pativilca"
    },
    {
      "id": "150204",
      "text": "Lima - Barranca - Supe"
    },
    {
      "id": "150205",
      "text": "Lima - Barranca - Supe Puerto"
    },
    {
      "id": "150301",
      "text": "Lima - Cajatambo - Cajatambo"
    },
    {
      "id": "150302",
      "text": "Lima - Cajatambo - Copa"
    },
    {
      "id": "150303",
      "text": "Lima - Cajatambo - Gorgor"
    },
    {
      "id": "150304",
      "text": "Lima - Cajatambo - Huancapon"
    },
    {
      "id": "150305",
      "text": "Lima - Cajatambo - Manas"
    },
    {
      "id": "150401",
      "text": "Lima - Canta - Canta"
    },
    {
      "id": "150402",
      "text": "Lima - Canta - Arahuay"
    },
    {
      "id": "150403",
      "text": "Lima - Canta - Huamantanga"
    },
    {
      "id": "150404",
      "text": "Lima - Canta - Huaros"
    },
    {
      "id": "150405",
      "text": "Lima - Canta - Lachaqui"
    },
    {
      "id": "150406",
      "text": "Lima - Canta - San Buenaventura"
    },
    {
      "id": "150407",
      "text": "Lima - Canta - Santa Rosa de Quives"
    },
    {
      "id": "150501",
      "text": "Lima - Cañete - San Vicente de Cañete"
    },
    {
      "id": "150502",
      "text": "Lima - Cañete - Asia"
    },
    {
      "id": "150503",
      "text": "Lima - Cañete - Calango"
    },
    {
      "id": "150504",
      "text": "Lima - Cañete - Cerro Azul"
    },
    {
      "id": "150505",
      "text": "Lima - Cañete - Chilca"
    },
    {
      "id": "150506",
      "text": "Lima - Cañete - Coayllo"
    },
    {
      "id": "150507",
      "text": "Lima - Cañete - Imperial"
    },
    {
      "id": "150508",
      "text": "Lima - Cañete - Lunahuana"
    },
    {
      "id": "150509",
      "text": "Lima - Cañete - Mala"
    },
    {
      "id": "150510",
      "text": "Lima - Cañete - Nuevo Imperial"
    },
    {
      "id": "150511",
      "text": "Lima - Cañete - Pacaran"
    },
    {
      "id": "150512",
      "text": "Lima - Cañete - Quilmana"
    },
    {
      "id": "150513",
      "text": "Lima - Cañete - San Antonio"
    },
    {
      "id": "150514",
      "text": "Lima - Cañete - San Luis"
    },
    {
      "id": "150515",
      "text": "Lima - Cañete - Santa Cruz de Flores"
    },
    {
      "id": "150516",
      "text": "Lima - Cañete - Zúñiga"
    },
    {
      "id": "150601",
      "text": "Lima - Huaral - Huaral"
    },
    {
      "id": "150602",
      "text": "Lima - Huaral - Atavillos Alto"
    },
    {
      "id": "150603",
      "text": "Lima - Huaral - Atavillos Bajo"
    },
    {
      "id": "150604",
      "text": "Lima - Huaral - Aucallama"
    },
    {
      "id": "150605",
      "text": "Lima - Huaral - Chancay"
    },
    {
      "id": "150606",
      "text": "Lima - Huaral - Ihuari"
    },
    {
      "id": "150607",
      "text": "Lima - Huaral - Lampian"
    },
    {
      "id": "150608",
      "text": "Lima - Huaral - Pacaraos"
    },
    {
      "id": "150609",
      "text": "Lima - Huaral - San Miguel de Acos"
    },
    {
      "id": "150610",
      "text": "Lima - Huaral - Santa Cruz de Andamarca"
    },
    {
      "id": "150611",
      "text": "Lima - Huaral - Sumbilca"
    },
    {
      "id": "150612",
      "text": "Lima - Huaral - Veintisiete de Noviembre"
    },
    {
      "id": "150701",
      "text": "Lima - Huarochirí - Matucana"
    },
    {
      "id": "150702",
      "text": "Lima - Huarochirí - Antioquia"
    },
    {
      "id": "150703",
      "text": "Lima - Huarochirí - Callahuanca"
    },
    {
      "id": "150704",
      "text": "Lima - Huarochirí - Carampoma"
    },
    {
      "id": "150705",
      "text": "Lima - Huarochirí - Chicla"
    },
    {
      "id": "150706",
      "text": "Lima - Huarochirí - Cuenca"
    },
    {
      "id": "150707",
      "text": "Lima - Huarochirí - Huachupampa"
    },
    {
      "id": "150708",
      "text": "Lima - Huarochirí - Huanza"
    },
    {
      "id": "150709",
      "text": "Lima - Huarochirí - Huarochiri"
    },
    {
      "id": "150710",
      "text": "Lima - Huarochirí - Lahuaytambo"
    },
    {
      "id": "150711",
      "text": "Lima - Huarochirí - Langa"
    },
    {
      "id": "150712",
      "text": "Lima - Huarochirí - Laraos"
    },
    {
      "id": "150713",
      "text": "Lima - Huarochirí - Mariatana"
    },
    {
      "id": "150714",
      "text": "Lima - Huarochirí - Ricardo Palma"
    },
    {
      "id": "150715",
      "text": "Lima - Huarochirí - San Andrés de Tupicocha"
    },
    {
      "id": "150716",
      "text": "Lima - Huarochirí - San Antonio"
    },
    {
      "id": "150717",
      "text": "Lima - Huarochirí - San Bartolomé"
    },
    {
      "id": "150718",
      "text": "Lima - Huarochirí - San Damian"
    },
    {
      "id": "150719",
      "text": "Lima - Huarochirí - San Juan de Iris"
    },
    {
      "id": "150720",
      "text": "Lima - Huarochirí - San Juan de Tantaranche"
    },
    {
      "id": "150721",
      "text": "Lima - Huarochirí - San Lorenzo de Quinti"
    },
    {
      "id": "150722",
      "text": "Lima - Huarochirí - San Mateo"
    },
    {
      "id": "150723",
      "text": "Lima - Huarochirí - San Mateo de Otao"
    },
    {
      "id": "150724",
      "text": "Lima - Huarochirí - San Pedro de Casta"
    },
    {
      "id": "150725",
      "text": "Lima - Huarochirí - San Pedro de Huancayre"
    },
    {
      "id": "150726",
      "text": "Lima - Huarochirí - Sangallaya"
    },
    {
      "id": "150727",
      "text": "Lima - Huarochirí - Santa Cruz de Cocachacra"
    },
    {
      "id": "150728",
      "text": "Lima - Huarochirí - Santa Eulalia"
    },
    {
      "id": "150729",
      "text": "Lima - Huarochirí - Santiago de Anchucaya"
    },
    {
      "id": "150730",
      "text": "Lima - Huarochirí - Santiago de Tuna"
    },
    {
      "id": "150731",
      "text": "Lima - Huarochirí - Santo Domingo de Los Olleros"
    },
    {
      "id": "150732",
      "text": "Lima - Huarochirí - Surco"
    },
    {
      "id": "150801",
      "text": "Lima - Huaura - Huacho"
    },
    {
      "id": "150802",
      "text": "Lima - Huaura - Ambar"
    },
    {
      "id": "150803",
      "text": "Lima - Huaura - Caleta de Carquin"
    },
    {
      "id": "150804",
      "text": "Lima - Huaura - Checras"
    },
    {
      "id": "150805",
      "text": "Lima - Huaura - Hualmay"
    },
    {
      "id": "150806",
      "text": "Lima - Huaura - Huaura"
    },
    {
      "id": "150807",
      "text": "Lima - Huaura - Leoncio Prado"
    },
    {
      "id": "150808",
      "text": "Lima - Huaura - Paccho"
    },
    {
      "id": "150809",
      "text": "Lima - Huaura - Santa Leonor"
    },
    {
      "id": "150810",
      "text": "Lima - Huaura - Santa María"
    },
    {
      "id": "150811",
      "text": "Lima - Huaura - Sayan"
    },
    {
      "id": "150812",
      "text": "Lima - Huaura - Vegueta"
    },
    {
      "id": "150901",
      "text": "Lima - Oyón - Oyon"
    },
    {
      "id": "150902",
      "text": "Lima - Oyón - Andajes"
    },
    {
      "id": "150903",
      "text": "Lima - Oyón - Caujul"
    },
    {
      "id": "150904",
      "text": "Lima - Oyón - Cochamarca"
    },
    {
      "id": "150905",
      "text": "Lima - Oyón - Navan"
    },
    {
      "id": "150906",
      "text": "Lima - Oyón - Pachangara"
    },
    {
      "id": "151001",
      "text": "Lima - Yauyos - Yauyos"
    },
    {
      "id": "151002",
      "text": "Lima - Yauyos - Alis"
    },
    {
      "id": "151003",
      "text": "Lima - Yauyos - Allauca"
    },
    {
      "id": "151004",
      "text": "Lima - Yauyos - Ayaviri"
    },
    {
      "id": "151005",
      "text": "Lima - Yauyos - Azángaro"
    },
    {
      "id": "151006",
      "text": "Lima - Yauyos - Cacra"
    },
    {
      "id": "151007",
      "text": "Lima - Yauyos - Carania"
    },
    {
      "id": "151008",
      "text": "Lima - Yauyos - Catahuasi"
    },
    {
      "id": "151009",
      "text": "Lima - Yauyos - Chocos"
    },
    {
      "id": "151010",
      "text": "Lima - Yauyos - Cochas"
    },
    {
      "id": "151011",
      "text": "Lima - Yauyos - Colonia"
    },
    {
      "id": "151012",
      "text": "Lima - Yauyos - Hongos"
    },
    {
      "id": "151013",
      "text": "Lima - Yauyos - Huampara"
    },
    {
      "id": "151014",
      "text": "Lima - Yauyos - Huancaya"
    },
    {
      "id": "151015",
      "text": "Lima - Yauyos - Huangascar"
    },
    {
      "id": "151016",
      "text": "Lima - Yauyos - Huantan"
    },
    {
      "id": "151017",
      "text": "Lima - Yauyos - Huañec"
    },
    {
      "id": "151018",
      "text": "Lima - Yauyos - Laraos"
    },
    {
      "id": "151019",
      "text": "Lima - Yauyos - Lincha"
    },
    {
      "id": "151020",
      "text": "Lima - Yauyos - Madean"
    },
    {
      "id": "151021",
      "text": "Lima - Yauyos - Miraflores"
    },
    {
      "id": "151022",
      "text": "Lima - Yauyos - Omas"
    },
    {
      "id": "151023",
      "text": "Lima - Yauyos - Putinza"
    },
    {
      "id": "151024",
      "text": "Lima - Yauyos - Quinches"
    },
    {
      "id": "151025",
      "text": "Lima - Yauyos - Quinocay"
    },
    {
      "id": "151026",
      "text": "Lima - Yauyos - San Joaquín"
    },
    {
      "id": "151027",
      "text": "Lima - Yauyos - San Pedro de Pilas"
    },
    {
      "id": "151028",
      "text": "Lima - Yauyos - Tanta"
    },
    {
      "id": "151029",
      "text": "Lima - Yauyos - Tauripampa"
    },
    {
      "id": "151030",
      "text": "Lima - Yauyos - Tomas"
    },
    {
      "id": "151031",
      "text": "Lima - Yauyos - Tupe"
    },
    {
      "id": "151032",
      "text": "Lima - Yauyos - Viñac"
    },
    {
      "id": "151033",
      "text": "Lima - Yauyos - Vitis"
    },
    {
      "id": "160101",
      "text": "Loreto - Maynas - Iquitos"
    },
    {
      "id": "160102",
      "text": "Loreto - Maynas - Alto Nanay"
    },
    {
      "id": "160103",
      "text": "Loreto - Maynas - Fernando Lores"
    },
    {
      "id": "160104",
      "text": "Loreto - Maynas - Indiana"
    },
    {
      "id": "160105",
      "text": "Loreto - Maynas - Las Amazonas"
    },
    {
      "id": "160106",
      "text": "Loreto - Maynas - Mazan"
    },
    {
      "id": "160107",
      "text": "Loreto - Maynas - Napo"
    },
    {
      "id": "160108",
      "text": "Loreto - Maynas - Punchana"
    },
    {
      "id": "160110",
      "text": "Loreto - Maynas - Torres Causana"
    },
    {
      "id": "160112",
      "text": "Loreto - Maynas - Belén"
    },
    {
      "id": "160113",
      "text": "Loreto - Maynas - San Juan Bautista"
    },
    {
      "id": "160201",
      "text": "Loreto - Alto Amazonas - Yurimaguas"
    },
    {
      "id": "160202",
      "text": "Loreto - Alto Amazonas - Balsapuerto"
    },
    {
      "id": "160205",
      "text": "Loreto - Alto Amazonas - Jeberos"
    },
    {
      "id": "160206",
      "text": "Loreto - Alto Amazonas - Lagunas"
    },
    {
      "id": "160210",
      "text": "Loreto - Alto Amazonas - Santa Cruz"
    },
    {
      "id": "160211",
      "text": "Loreto - Alto Amazonas - Teniente Cesar López Rojas"
    },
    {
      "id": "160301",
      "text": "Loreto - Loreto - Nauta"
    },
    {
      "id": "160302",
      "text": "Loreto - Loreto - Parinari"
    },
    {
      "id": "160303",
      "text": "Loreto - Loreto - Tigre"
    },
    {
      "id": "160304",
      "text": "Loreto - Loreto - Trompeteros"
    },
    {
      "id": "160305",
      "text": "Loreto - Loreto - Urarinas"
    },
    {
      "id": "160401",
      "text": "Loreto - Mariscal Ramón Castilla - Ramón Castilla"
    },
    {
      "id": "160402",
      "text": "Loreto - Mariscal Ramón Castilla - Pebas"
    },
    {
      "id": "160403",
      "text": "Loreto - Mariscal Ramón Castilla - Yavari"
    },
    {
      "id": "160404",
      "text": "Loreto - Mariscal Ramón Castilla - San Pablo"
    },
    {
      "id": "160501",
      "text": "Loreto - Requena - Requena"
    },
    {
      "id": "160502",
      "text": "Loreto - Requena - Alto Tapiche"
    },
    {
      "id": "160503",
      "text": "Loreto - Requena - Capelo"
    },
    {
      "id": "160504",
      "text": "Loreto - Requena - Emilio San Martín"
    },
    {
      "id": "160505",
      "text": "Loreto - Requena - Maquia"
    },
    {
      "id": "160506",
      "text": "Loreto - Requena - Puinahua"
    },
    {
      "id": "160507",
      "text": "Loreto - Requena - Saquena"
    },
    {
      "id": "160508",
      "text": "Loreto - Requena - Soplin"
    },
    {
      "id": "160509",
      "text": "Loreto - Requena - Tapiche"
    },
    {
      "id": "160510",
      "text": "Loreto - Requena - Jenaro Herrera"
    },
    {
      "id": "160511",
      "text": "Loreto - Requena - Yaquerana"
    },
    {
      "id": "160601",
      "text": "Loreto - Ucayali - Contamana"
    },
    {
      "id": "160602",
      "text": "Loreto - Ucayali - Inahuaya"
    },
    {
      "id": "160603",
      "text": "Loreto - Ucayali - Padre Márquez"
    },
    {
      "id": "160604",
      "text": "Loreto - Ucayali - Pampa Hermosa"
    },
    {
      "id": "160605",
      "text": "Loreto - Ucayali - Sarayacu"
    },
    {
      "id": "160606",
      "text": "Loreto - Ucayali - Vargas Guerra"
    },
    {
      "id": "160701",
      "text": "Loreto - Datem del Marañón - Barranca"
    },
    {
      "id": "160702",
      "text": "Loreto - Datem del Marañón - Cahuapanas"
    },
    {
      "id": "160703",
      "text": "Loreto - Datem del Marañón - Manseriche"
    },
    {
      "id": "160704",
      "text": "Loreto - Datem del Marañón - Morona"
    },
    {
      "id": "160705",
      "text": "Loreto - Datem del Marañón - Pastaza"
    },
    {
      "id": "160706",
      "text": "Loreto - Datem del Marañón - Andoas"
    },
    {
      "id": "160801",
      "text": "Loreto - Putumayo - Putumayo"
    },
    {
      "id": "160802",
      "text": "Loreto - Putumayo - Rosa Panduro"
    },
    {
      "id": "160803",
      "text": "Loreto - Putumayo - Teniente Manuel Clavero"
    },
    {
      "id": "160804",
      "text": "Loreto - Putumayo - Yaguas"
    },
    {
      "id": "170101",
      "text": "Madre de Dios - Tambopata - Tambopata"
    },
    {
      "id": "170102",
      "text": "Madre de Dios - Tambopata - Inambari"
    },
    {
      "id": "170103",
      "text": "Madre de Dios - Tambopata - Las Piedras"
    },
    {
      "id": "170104",
      "text": "Madre de Dios - Tambopata - Laberinto"
    },
    {
      "id": "170201",
      "text": "Madre de Dios - Manu - Manu"
    },
    {
      "id": "170202",
      "text": "Madre de Dios - Manu - Fitzcarrald"
    },
    {
      "id": "170203",
      "text": "Madre de Dios - Manu - Madre de Dios"
    },
    {
      "id": "170204",
      "text": "Madre de Dios - Manu - Huepetuhe"
    },
    {
      "id": "170301",
      "text": "Madre de Dios - Tahuamanu - Iñapari"
    },
    {
      "id": "170302",
      "text": "Madre de Dios - Tahuamanu - Iberia"
    },
    {
      "id": "170303",
      "text": "Madre de Dios - Tahuamanu - Tahuamanu"
    },
    {
      "id": "180101",
      "text": "Moquegua - Mariscal Nieto - Moquegua"
    },
    {
      "id": "180102",
      "text": "Moquegua - Mariscal Nieto - Carumas"
    },
    {
      "id": "180103",
      "text": "Moquegua - Mariscal Nieto - Cuchumbaya"
    },
    {
      "id": "180104",
      "text": "Moquegua - Mariscal Nieto - Samegua"
    },
    {
      "id": "180105",
      "text": "Moquegua - Mariscal Nieto - San Cristóbal"
    },
    {
      "id": "180106",
      "text": "Moquegua - Mariscal Nieto - Torata"
    },
    {
      "id": "180201",
      "text": "Moquegua - General Sánchez Cerro - Omate"
    },
    {
      "id": "180202",
      "text": "Moquegua - General Sánchez Cerro - Chojata"
    },
    {
      "id": "180203",
      "text": "Moquegua - General Sánchez Cerro - Coalaque"
    },
    {
      "id": "180204",
      "text": "Moquegua - General Sánchez Cerro - Ichuña"
    },
    {
      "id": "180205",
      "text": "Moquegua - General Sánchez Cerro - La Capilla"
    },
    {
      "id": "180206",
      "text": "Moquegua - General Sánchez Cerro - Lloque"
    },
    {
      "id": "180207",
      "text": "Moquegua - General Sánchez Cerro - Matalaque"
    },
    {
      "id": "180208",
      "text": "Moquegua - General Sánchez Cerro - Puquina"
    },
    {
      "id": "180209",
      "text": "Moquegua - General Sánchez Cerro - Quinistaquillas"
    },
    {
      "id": "180210",
      "text": "Moquegua - General Sánchez Cerro - Ubinas"
    },
    {
      "id": "180211",
      "text": "Moquegua - General Sánchez Cerro - Yunga"
    },
    {
      "id": "180301",
      "text": "Moquegua - Ilo - Ilo"
    },
    {
      "id": "180302",
      "text": "Moquegua - Ilo - El Algarrobal"
    },
    {
      "id": "180303",
      "text": "Moquegua - Ilo - Pacocha"
    },
    {
      "id": "190101",
      "text": "Pasco - Pasco - Chaupimarca"
    },
    {
      "id": "190102",
      "text": "Pasco - Pasco - Huachon"
    },
    {
      "id": "190103",
      "text": "Pasco - Pasco - Huariaca"
    },
    {
      "id": "190104",
      "text": "Pasco - Pasco - Huayllay"
    },
    {
      "id": "190105",
      "text": "Pasco - Pasco - Ninacaca"
    },
    {
      "id": "190106",
      "text": "Pasco - Pasco - Pallanchacra"
    },
    {
      "id": "190107",
      "text": "Pasco - Pasco - Paucartambo"
    },
    {
      "id": "190108",
      "text": "Pasco - Pasco - San Francisco de Asís de Yarusyacan"
    },
    {
      "id": "190109",
      "text": "Pasco - Pasco - Simon Bolívar"
    },
    {
      "id": "190110",
      "text": "Pasco - Pasco - Ticlacayan"
    },
    {
      "id": "190111",
      "text": "Pasco - Pasco - Tinyahuarco"
    },
    {
      "id": "190112",
      "text": "Pasco - Pasco - Vicco"
    },
    {
      "id": "190113",
      "text": "Pasco - Pasco - Yanacancha"
    },
    {
      "id": "190201",
      "text": "Pasco - Daniel Alcides Carrión - Yanahuanca"
    },
    {
      "id": "190202",
      "text": "Pasco - Daniel Alcides Carrión - Chacayan"
    },
    {
      "id": "190203",
      "text": "Pasco - Daniel Alcides Carrión - Goyllarisquizga"
    },
    {
      "id": "190204",
      "text": "Pasco - Daniel Alcides Carrión - Paucar"
    },
    {
      "id": "190205",
      "text": "Pasco - Daniel Alcides Carrión - San Pedro de Pillao"
    },
    {
      "id": "190206",
      "text": "Pasco - Daniel Alcides Carrión - Santa Ana de Tusi"
    },
    {
      "id": "190207",
      "text": "Pasco - Daniel Alcides Carrión - Tapuc"
    },
    {
      "id": "190208",
      "text": "Pasco - Daniel Alcides Carrión - Vilcabamba"
    },
    {
      "id": "190301",
      "text": "Pasco - Oxapampa - Oxapampa"
    },
    {
      "id": "190302",
      "text": "Pasco - Oxapampa - Chontabamba"
    },
    {
      "id": "190303",
      "text": "Pasco - Oxapampa - Huancabamba"
    },
    {
      "id": "190304",
      "text": "Pasco - Oxapampa - Palcazu"
    },
    {
      "id": "190305",
      "text": "Pasco - Oxapampa - Pozuzo"
    },
    {
      "id": "190306",
      "text": "Pasco - Oxapampa - Puerto Bermúdez"
    },
    {
      "id": "190307",
      "text": "Pasco - Oxapampa - Villa Rica"
    },
    {
      "id": "190308",
      "text": "Pasco - Oxapampa - Constitución"
    },
    {
      "id": "200101",
      "text": "Piura - Piura - Piura"
    },
    {
      "id": "200104",
      "text": "Piura - Piura - Castilla"
    },
    {
      "id": "200105",
      "text": "Piura - Piura - Catacaos"
    },
    {
      "id": "200107",
      "text": "Piura - Piura - Cura Mori"
    },
    {
      "id": "200108",
      "text": "Piura - Piura - El Tallan"
    },
    {
      "id": "200109",
      "text": "Piura - Piura - La Arena"
    },
    {
      "id": "200110",
      "text": "Piura - Piura - La Unión"
    },
    {
      "id": "200111",
      "text": "Piura - Piura - Las Lomas"
    },
    {
      "id": "200114",
      "text": "Piura - Piura - Tambo Grande"
    },
    {
      "id": "200115",
      "text": "Piura - Piura - Veintiseis de Octubre"
    },
    {
      "id": "200201",
      "text": "Piura - Ayabaca - Ayabaca"
    },
    {
      "id": "200202",
      "text": "Piura - Ayabaca - Frias"
    },
    {
      "id": "200203",
      "text": "Piura - Ayabaca - Jilili"
    },
    {
      "id": "200204",
      "text": "Piura - Ayabaca - Lagunas"
    },
    {
      "id": "200205",
      "text": "Piura - Ayabaca - Montero"
    },
    {
      "id": "200206",
      "text": "Piura - Ayabaca - Pacaipampa"
    },
    {
      "id": "200207",
      "text": "Piura - Ayabaca - Paimas"
    },
    {
      "id": "200208",
      "text": "Piura - Ayabaca - Sapillica"
    },
    {
      "id": "200209",
      "text": "Piura - Ayabaca - Sicchez"
    },
    {
      "id": "200210",
      "text": "Piura - Ayabaca - Suyo"
    },
    {
      "id": "200301",
      "text": "Piura - Huancabamba - Huancabamba"
    },
    {
      "id": "200302",
      "text": "Piura - Huancabamba - Canchaque"
    },
    {
      "id": "200303",
      "text": "Piura - Huancabamba - El Carmen de la Frontera"
    },
    {
      "id": "200304",
      "text": "Piura - Huancabamba - Huarmaca"
    },
    {
      "id": "200305",
      "text": "Piura - Huancabamba - Lalaquiz"
    },
    {
      "id": "200306",
      "text": "Piura - Huancabamba - San Miguel de El Faique"
    },
    {
      "id": "200307",
      "text": "Piura - Huancabamba - Sondor"
    },
    {
      "id": "200308",
      "text": "Piura - Huancabamba - Sondorillo"
    },
    {
      "id": "200401",
      "text": "Piura - Morropón - Chulucanas"
    },
    {
      "id": "200402",
      "text": "Piura - Morropón - Buenos Aires"
    },
    {
      "id": "200403",
      "text": "Piura - Morropón - Chalaco"
    },
    {
      "id": "200404",
      "text": "Piura - Morropón - La Matanza"
    },
    {
      "id": "200405",
      "text": "Piura - Morropón - Morropon"
    },
    {
      "id": "200406",
      "text": "Piura - Morropón - Salitral"
    },
    {
      "id": "200407",
      "text": "Piura - Morropón - San Juan de Bigote"
    },
    {
      "id": "200408",
      "text": "Piura - Morropón - Santa Catalina de Mossa"
    },
    {
      "id": "200409",
      "text": "Piura - Morropón - Santo Domingo"
    },
    {
      "id": "200410",
      "text": "Piura - Morropón - Yamango"
    },
    {
      "id": "200501",
      "text": "Piura - Paita - Paita"
    },
    {
      "id": "200502",
      "text": "Piura - Paita - Amotape"
    },
    {
      "id": "200503",
      "text": "Piura - Paita - Arenal"
    },
    {
      "id": "200504",
      "text": "Piura - Paita - Colan"
    },
    {
      "id": "200505",
      "text": "Piura - Paita - La Huaca"
    },
    {
      "id": "200506",
      "text": "Piura - Paita - Tamarindo"
    },
    {
      "id": "200507",
      "text": "Piura - Paita - Vichayal"
    },
    {
      "id": "200601",
      "text": "Piura - Sullana - Sullana"
    },
    {
      "id": "200602",
      "text": "Piura - Sullana - Bellavista"
    },
    {
      "id": "200603",
      "text": "Piura - Sullana - Ignacio Escudero"
    },
    {
      "id": "200604",
      "text": "Piura - Sullana - Lancones"
    },
    {
      "id": "200605",
      "text": "Piura - Sullana - Marcavelica"
    },
    {
      "id": "200606",
      "text": "Piura - Sullana - Miguel Checa"
    },
    {
      "id": "200607",
      "text": "Piura - Sullana - Querecotillo"
    },
    {
      "id": "200608",
      "text": "Piura - Sullana - Salitral"
    },
    {
      "id": "200701",
      "text": "Piura - Talara - Pariñas"
    },
    {
      "id": "200702",
      "text": "Piura - Talara - El Alto"
    },
    {
      "id": "200703",
      "text": "Piura - Talara - La Brea"
    },
    {
      "id": "200704",
      "text": "Piura - Talara - Lobitos"
    },
    {
      "id": "200705",
      "text": "Piura - Talara - Los Organos"
    },
    {
      "id": "200706",
      "text": "Piura - Talara - Mancora"
    },
    {
      "id": "200801",
      "text": "Piura - Sechura - Sechura"
    },
    {
      "id": "200802",
      "text": "Piura - Sechura - Bellavista de la Unión"
    },
    {
      "id": "200803",
      "text": "Piura - Sechura - Bernal"
    },
    {
      "id": "200804",
      "text": "Piura - Sechura - Cristo Nos Valga"
    },
    {
      "id": "200805",
      "text": "Piura - Sechura - Vice"
    },
    {
      "id": "200806",
      "text": "Piura - Sechura - Rinconada Llicuar"
    },
    {
      "id": "210101",
      "text": "Puno - Puno - Puno"
    },
    {
      "id": "210102",
      "text": "Puno - Puno - Acora"
    },
    {
      "id": "210103",
      "text": "Puno - Puno - Amantani"
    },
    {
      "id": "210104",
      "text": "Puno - Puno - Atuncolla"
    },
    {
      "id": "210105",
      "text": "Puno - Puno - Capachica"
    },
    {
      "id": "210106",
      "text": "Puno - Puno - Chucuito"
    },
    {
      "id": "210107",
      "text": "Puno - Puno - Coata"
    },
    {
      "id": "210108",
      "text": "Puno - Puno - Huata"
    },
    {
      "id": "210109",
      "text": "Puno - Puno - Mañazo"
    },
    {
      "id": "210110",
      "text": "Puno - Puno - Paucarcolla"
    },
    {
      "id": "210111",
      "text": "Puno - Puno - Pichacani"
    },
    {
      "id": "210112",
      "text": "Puno - Puno - Plateria"
    },
    {
      "id": "210113",
      "text": "Puno - Puno - San Antonio"
    },
    {
      "id": "210114",
      "text": "Puno - Puno - Tiquillaca"
    },
    {
      "id": "210115",
      "text": "Puno - Puno - Vilque"
    },
    {
      "id": "210201",
      "text": "Puno - Azángaro - Azángaro"
    },
    {
      "id": "210202",
      "text": "Puno - Azángaro - Achaya"
    },
    {
      "id": "210203",
      "text": "Puno - Azángaro - Arapa"
    },
    {
      "id": "210204",
      "text": "Puno - Azángaro - Asillo"
    },
    {
      "id": "210205",
      "text": "Puno - Azángaro - Caminaca"
    },
    {
      "id": "210206",
      "text": "Puno - Azángaro - Chupa"
    },
    {
      "id": "210207",
      "text": "Puno - Azángaro - José Domingo Choquehuanca"
    },
    {
      "id": "210208",
      "text": "Puno - Azángaro - Muñani"
    },
    {
      "id": "210209",
      "text": "Puno - Azángaro - Potoni"
    },
    {
      "id": "210210",
      "text": "Puno - Azángaro - Saman"
    },
    {
      "id": "210211",
      "text": "Puno - Azángaro - San Anton"
    },
    {
      "id": "210212",
      "text": "Puno - Azángaro - San José"
    },
    {
      "id": "210213",
      "text": "Puno - Azángaro - San Juan de Salinas"
    },
    {
      "id": "210214",
      "text": "Puno - Azángaro - Santiago de Pupuja"
    },
    {
      "id": "210215",
      "text": "Puno - Azángaro - Tirapata"
    },
    {
      "id": "210301",
      "text": "Puno - Carabaya - Macusani"
    },
    {
      "id": "210302",
      "text": "Puno - Carabaya - Ajoyani"
    },
    {
      "id": "210303",
      "text": "Puno - Carabaya - Ayapata"
    },
    {
      "id": "210304",
      "text": "Puno - Carabaya - Coasa"
    },
    {
      "id": "210305",
      "text": "Puno - Carabaya - Corani"
    },
    {
      "id": "210306",
      "text": "Puno - Carabaya - Crucero"
    },
    {
      "id": "210307",
      "text": "Puno - Carabaya - Ituata"
    },
    {
      "id": "210308",
      "text": "Puno - Carabaya - Ollachea"
    },
    {
      "id": "210309",
      "text": "Puno - Carabaya - San Gaban"
    },
    {
      "id": "210310",
      "text": "Puno - Carabaya - Usicayos"
    },
    {
      "id": "210401",
      "text": "Puno - Chucuito - Juli"
    },
    {
      "id": "210402",
      "text": "Puno - Chucuito - Desaguadero"
    },
    {
      "id": "210403",
      "text": "Puno - Chucuito - Huacullani"
    },
    {
      "id": "210404",
      "text": "Puno - Chucuito - Kelluyo"
    },
    {
      "id": "210405",
      "text": "Puno - Chucuito - Pisacoma"
    },
    {
      "id": "210406",
      "text": "Puno - Chucuito - Pomata"
    },
    {
      "id": "210407",
      "text": "Puno - Chucuito - Zepita"
    },
    {
      "id": "210501",
      "text": "Puno - El Collao - Ilave"
    },
    {
      "id": "210502",
      "text": "Puno - El Collao - Capazo"
    },
    {
      "id": "210503",
      "text": "Puno - El Collao - Pilcuyo"
    },
    {
      "id": "210504",
      "text": "Puno - El Collao - Santa Rosa"
    },
    {
      "id": "210505",
      "text": "Puno - El Collao - Conduriri"
    },
    {
      "id": "210601",
      "text": "Puno - Huancané - Huancane"
    },
    {
      "id": "210602",
      "text": "Puno - Huancané - Cojata"
    },
    {
      "id": "210603",
      "text": "Puno - Huancané - Huatasani"
    },
    {
      "id": "210604",
      "text": "Puno - Huancané - Inchupalla"
    },
    {
      "id": "210605",
      "text": "Puno - Huancané - Pusi"
    },
    {
      "id": "210606",
      "text": "Puno - Huancané - Rosaspata"
    },
    {
      "id": "210607",
      "text": "Puno - Huancané - Taraco"
    },
    {
      "id": "210608",
      "text": "Puno - Huancané - Vilque Chico"
    },
    {
      "id": "210701",
      "text": "Puno - Lampa - Lampa"
    },
    {
      "id": "210702",
      "text": "Puno - Lampa - Cabanilla"
    },
    {
      "id": "210703",
      "text": "Puno - Lampa - Calapuja"
    },
    {
      "id": "210704",
      "text": "Puno - Lampa - Nicasio"
    },
    {
      "id": "210705",
      "text": "Puno - Lampa - Ocuviri"
    },
    {
      "id": "210706",
      "text": "Puno - Lampa - Palca"
    },
    {
      "id": "210707",
      "text": "Puno - Lampa - Paratia"
    },
    {
      "id": "210708",
      "text": "Puno - Lampa - Pucara"
    },
    {
      "id": "210709",
      "text": "Puno - Lampa - Santa Lucia"
    },
    {
      "id": "210710",
      "text": "Puno - Lampa - Vilavila"
    },
    {
      "id": "210801",
      "text": "Puno - Melgar - Ayaviri"
    },
    {
      "id": "210802",
      "text": "Puno - Melgar - Antauta"
    },
    {
      "id": "210803",
      "text": "Puno - Melgar - Cupi"
    },
    {
      "id": "210804",
      "text": "Puno - Melgar - Llalli"
    },
    {
      "id": "210805",
      "text": "Puno - Melgar - Macari"
    },
    {
      "id": "210806",
      "text": "Puno - Melgar - Nuñoa"
    },
    {
      "id": "210807",
      "text": "Puno - Melgar - Orurillo"
    },
    {
      "id": "210808",
      "text": "Puno - Melgar - Santa Rosa"
    },
    {
      "id": "210809",
      "text": "Puno - Melgar - Umachiri"
    },
    {
      "id": "210901",
      "text": "Puno - Moho - Moho"
    },
    {
      "id": "210902",
      "text": "Puno - Moho - Conima"
    },
    {
      "id": "210903",
      "text": "Puno - Moho - Huayrapata"
    },
    {
      "id": "210904",
      "text": "Puno - Moho - Tilali"
    },
    {
      "id": "211001",
      "text": "Puno - San Antonio de Putina - Putina"
    },
    {
      "id": "211002",
      "text": "Puno - San Antonio de Putina - Ananea"
    },
    {
      "id": "211003",
      "text": "Puno - San Antonio de Putina - Pedro Vilca Apaza"
    },
    {
      "id": "211004",
      "text": "Puno - San Antonio de Putina - Quilcapuncu"
    },
    {
      "id": "211005",
      "text": "Puno - San Antonio de Putina - Sina"
    },
    {
      "id": "211101",
      "text": "Puno - San Román - Juliaca"
    },
    {
      "id": "211102",
      "text": "Puno - San Román - Cabana"
    },
    {
      "id": "211103",
      "text": "Puno - San Román - Cabanillas"
    },
    {
      "id": "211104",
      "text": "Puno - San Román - Caracoto"
    },
    {
      "id": "211105",
      "text": "Puno - San Román - San Miguel"
    },
    {
      "id": "211201",
      "text": "Puno - Sandia - Sandia"
    },
    {
      "id": "211202",
      "text": "Puno - Sandia - Cuyocuyo"
    },
    {
      "id": "211203",
      "text": "Puno - Sandia - Limbani"
    },
    {
      "id": "211204",
      "text": "Puno - Sandia - Patambuco"
    },
    {
      "id": "211205",
      "text": "Puno - Sandia - Phara"
    },
    {
      "id": "211206",
      "text": "Puno - Sandia - Quiaca"
    },
    {
      "id": "211207",
      "text": "Puno - Sandia - San Juan del Oro"
    },
    {
      "id": "211208",
      "text": "Puno - Sandia - Yanahuaya"
    },
    {
      "id": "211209",
      "text": "Puno - Sandia - Alto Inambari"
    },
    {
      "id": "211210",
      "text": "Puno - Sandia - San Pedro de Putina Punco"
    },
    {
      "id": "211301",
      "text": "Puno - Yunguyo - Yunguyo"
    },
    {
      "id": "211302",
      "text": "Puno - Yunguyo - Anapia"
    },
    {
      "id": "211303",
      "text": "Puno - Yunguyo - Copani"
    },
    {
      "id": "211304",
      "text": "Puno - Yunguyo - Cuturapi"
    },
    {
      "id": "211305",
      "text": "Puno - Yunguyo - Ollaraya"
    },
    {
      "id": "211306",
      "text": "Puno - Yunguyo - Tinicachi"
    },
    {
      "id": "211307",
      "text": "Puno - Yunguyo - Unicachi"
    },
    {
      "id": "220101",
      "text": "San Martín - Moyobamba - Moyobamba"
    },
    {
      "id": "220102",
      "text": "San Martín - Moyobamba - Calzada"
    },
    {
      "id": "220103",
      "text": "San Martín - Moyobamba - Habana"
    },
    {
      "id": "220104",
      "text": "San Martín - Moyobamba - Jepelacio"
    },
    {
      "id": "220105",
      "text": "San Martín - Moyobamba - Soritor"
    },
    {
      "id": "220106",
      "text": "San Martín - Moyobamba - Yantalo"
    },
    {
      "id": "220201",
      "text": "San Martín - Bellavista - Bellavista"
    },
    {
      "id": "220202",
      "text": "San Martín - Bellavista - Alto Biavo"
    },
    {
      "id": "220203",
      "text": "San Martín - Bellavista - Bajo Biavo"
    },
    {
      "id": "220204",
      "text": "San Martín - Bellavista - Huallaga"
    },
    {
      "id": "220205",
      "text": "San Martín - Bellavista - San Pablo"
    },
    {
      "id": "220206",
      "text": "San Martín - Bellavista - San Rafael"
    },
    {
      "id": "220301",
      "text": "San Martín - El Dorado - San José de Sisa"
    },
    {
      "id": "220302",
      "text": "San Martín - El Dorado - Agua Blanca"
    },
    {
      "id": "220303",
      "text": "San Martín - El Dorado - San Martín"
    },
    {
      "id": "220304",
      "text": "San Martín - El Dorado - Santa Rosa"
    },
    {
      "id": "220305",
      "text": "San Martín - El Dorado - Shatoja"
    },
    {
      "id": "220401",
      "text": "San Martín - Huallaga - Saposoa"
    },
    {
      "id": "220402",
      "text": "San Martín - Huallaga - Alto Saposoa"
    },
    {
      "id": "220403",
      "text": "San Martín - Huallaga - El Eslabón"
    },
    {
      "id": "220404",
      "text": "San Martín - Huallaga - Piscoyacu"
    },
    {
      "id": "220405",
      "text": "San Martín - Huallaga - Sacanche"
    },
    {
      "id": "220406",
      "text": "San Martín - Huallaga - Tingo de Saposoa"
    },
    {
      "id": "220501",
      "text": "San Martín - Lamas - Lamas"
    },
    {
      "id": "220502",
      "text": "San Martín - Lamas - Alonso de Alvarado"
    },
    {
      "id": "220503",
      "text": "San Martín - Lamas - Barranquita"
    },
    {
      "id": "220504",
      "text": "San Martín - Lamas - Caynarachi"
    },
    {
      "id": "220505",
      "text": "San Martín - Lamas - Cuñumbuqui"
    },
    {
      "id": "220506",
      "text": "San Martín - Lamas - Pinto Recodo"
    },
    {
      "id": "220507",
      "text": "San Martín - Lamas - Rumisapa"
    },
    {
      "id": "220508",
      "text": "San Martín - Lamas - San Roque de Cumbaza"
    },
    {
      "id": "220509",
      "text": "San Martín - Lamas - Shanao"
    },
    {
      "id": "220510",
      "text": "San Martín - Lamas - Tabalosos"
    },
    {
      "id": "220511",
      "text": "San Martín - Lamas - Zapatero"
    },
    {
      "id": "220601",
      "text": "San Martín - Mariscal Cáceres - Juanjuí"
    },
    {
      "id": "220602",
      "text": "San Martín - Mariscal Cáceres - Campanilla"
    },
    {
      "id": "220603",
      "text": "San Martín - Mariscal Cáceres - Huicungo"
    },
    {
      "id": "220604",
      "text": "San Martín - Mariscal Cáceres - Pachiza"
    },
    {
      "id": "220605",
      "text": "San Martín - Mariscal Cáceres - Pajarillo"
    },
    {
      "id": "220701",
      "text": "San Martín - Picota - Picota"
    },
    {
      "id": "220702",
      "text": "San Martín - Picota - Buenos Aires"
    },
    {
      "id": "220703",
      "text": "San Martín - Picota - Caspisapa"
    },
    {
      "id": "220704",
      "text": "San Martín - Picota - Pilluana"
    },
    {
      "id": "220705",
      "text": "San Martín - Picota - Pucacaca"
    },
    {
      "id": "220706",
      "text": "San Martín - Picota - San Cristóbal"
    },
    {
      "id": "220707",
      "text": "San Martín - Picota - San Hilarión"
    },
    {
      "id": "220708",
      "text": "San Martín - Picota - Shamboyacu"
    },
    {
      "id": "220709",
      "text": "San Martín - Picota - Tingo de Ponasa"
    },
    {
      "id": "220710",
      "text": "San Martín - Picota - Tres Unidos"
    },
    {
      "id": "220801",
      "text": "San Martín - Rioja - Rioja"
    },
    {
      "id": "220802",
      "text": "San Martín - Rioja - Awajun"
    },
    {
      "id": "220803",
      "text": "San Martín - Rioja - Elías Soplin Vargas"
    },
    {
      "id": "220804",
      "text": "San Martín - Rioja - Nueva Cajamarca"
    },
    {
      "id": "220805",
      "text": "San Martín - Rioja - Pardo Miguel"
    },
    {
      "id": "220806",
      "text": "San Martín - Rioja - Posic"
    },
    {
      "id": "220807",
      "text": "San Martín - Rioja - San Fernando"
    },
    {
      "id": "220808",
      "text": "San Martín - Rioja - Yorongos"
    },
    {
      "id": "220809",
      "text": "San Martín - Rioja - Yuracyacu"
    },
    {
      "id": "220901",
      "text": "San Martín - San Martín - Tarapoto"
    },
    {
      "id": "220902",
      "text": "San Martín - San Martín - Alberto Leveau"
    },
    {
      "id": "220903",
      "text": "San Martín - San Martín - Cacatachi"
    },
    {
      "id": "220904",
      "text": "San Martín - San Martín - Chazuta"
    },
    {
      "id": "220905",
      "text": "San Martín - San Martín - Chipurana"
    },
    {
      "id": "220906",
      "text": "San Martín - San Martín - El Porvenir"
    },
    {
      "id": "220907",
      "text": "San Martín - San Martín - Huimbayoc"
    },
    {
      "id": "220908",
      "text": "San Martín - San Martín - Juan Guerra"
    },
    {
      "id": "220909",
      "text": "San Martín - San Martín - La Banda de Shilcayo"
    },
    {
      "id": "220910",
      "text": "San Martín - San Martín - Morales"
    },
    {
      "id": "220911",
      "text": "San Martín - San Martín - Papaplaya"
    },
    {
      "id": "220912",
      "text": "San Martín - San Martín - San Antonio"
    },
    {
      "id": "220913",
      "text": "San Martín - San Martín - Sauce"
    },
    {
      "id": "220914",
      "text": "San Martín - San Martín - Shapaja"
    },
    {
      "id": "221001",
      "text": "San Martín - Tocache - Tocache"
    },
    {
      "id": "221002",
      "text": "San Martín - Tocache - Nuevo Progreso"
    },
    {
      "id": "221003",
      "text": "San Martín - Tocache - Polvora"
    },
    {
      "id": "221004",
      "text": "San Martín - Tocache - Shunte"
    },
    {
      "id": "221005",
      "text": "San Martín - Tocache - Uchiza"
    },
    {
      "id": "221006",
      "text": "San Martín - Tocache - Santa Lucia"
    },
    {
      "id": "230101",
      "text": "Tacna - Tacna - Tacna"
    },
    {
      "id": "230102",
      "text": "Tacna - Tacna - Alto de la Alianza"
    },
    {
      "id": "230103",
      "text": "Tacna - Tacna - Calana"
    },
    {
      "id": "230104",
      "text": "Tacna - Tacna - Ciudad Nueva"
    },
    {
      "id": "230105",
      "text": "Tacna - Tacna - Inclan"
    },
    {
      "id": "230106",
      "text": "Tacna - Tacna - Pachia"
    },
    {
      "id": "230107",
      "text": "Tacna - Tacna - Palca"
    },
    {
      "id": "230108",
      "text": "Tacna - Tacna - Pocollay"
    },
    {
      "id": "230109",
      "text": "Tacna - Tacna - Sama"
    },
    {
      "id": "230110",
      "text": "Tacna - Tacna - Coronel Gregorio Albarracín Lanchipa"
    },
    {
      "id": "230111",
      "text": "Tacna - Tacna - La Yarada los Palos"
    },
    {
      "id": "230201",
      "text": "Tacna - Candarave - Candarave"
    },
    {
      "id": "230202",
      "text": "Tacna - Candarave - Cairani"
    },
    {
      "id": "230203",
      "text": "Tacna - Candarave - Camilaca"
    },
    {
      "id": "230204",
      "text": "Tacna - Candarave - Curibaya"
    },
    {
      "id": "230205",
      "text": "Tacna - Candarave - Huanuara"
    },
    {
      "id": "230206",
      "text": "Tacna - Candarave - Quilahuani"
    },
    {
      "id": "230301",
      "text": "Tacna - Jorge Basadre - Locumba"
    },
    {
      "id": "230302",
      "text": "Tacna - Jorge Basadre - Ilabaya"
    },
    {
      "id": "230303",
      "text": "Tacna - Jorge Basadre - Ite"
    },
    {
      "id": "230401",
      "text": "Tacna - Tarata - Tarata"
    },
    {
      "id": "230402",
      "text": "Tacna - Tarata - Héroes Albarracín"
    },
    {
      "id": "230403",
      "text": "Tacna - Tarata - Estique"
    },
    {
      "id": "230404",
      "text": "Tacna - Tarata - Estique-Pampa"
    },
    {
      "id": "230405",
      "text": "Tacna - Tarata - Sitajara"
    },
    {
      "id": "230406",
      "text": "Tacna - Tarata - Susapaya"
    },
    {
      "id": "230407",
      "text": "Tacna - Tarata - Tarucachi"
    },
    {
      "id": "230408",
      "text": "Tacna - Tarata - Ticaco"
    },
    {
      "id": "240101",
      "text": "Tumbes - Tumbes - Tumbes"
    },
    {
      "id": "240102",
      "text": "Tumbes - Tumbes - Corrales"
    },
    {
      "id": "240103",
      "text": "Tumbes - Tumbes - La Cruz"
    },
    {
      "id": "240104",
      "text": "Tumbes - Tumbes - Pampas de Hospital"
    },
    {
      "id": "240105",
      "text": "Tumbes - Tumbes - San Jacinto"
    },
    {
      "id": "240106",
      "text": "Tumbes - Tumbes - San Juan de la Virgen"
    },
    {
      "id": "240201",
      "text": "Tumbes - Contralmirante Villar - Zorritos"
    },
    {
      "id": "240202",
      "text": "Tumbes - Contralmirante Villar - Casitas"
    },
    {
      "id": "240203",
      "text": "Tumbes - Contralmirante Villar - Canoas de Punta Sal"
    },
    {
      "id": "240301",
      "text": "Tumbes - Zarumilla - Zarumilla"
    },
    {
      "id": "240302",
      "text": "Tumbes - Zarumilla - Aguas Verdes"
    },
    {
      "id": "240303",
      "text": "Tumbes - Zarumilla - Matapalo"
    },
    {
      "id": "240304",
      "text": "Tumbes - Zarumilla - Papayal"
    },
    {
      "id": "250101",
      "text": "Ucayali - Coronel Portillo - Calleria"
    },
    {
      "id": "250102",
      "text": "Ucayali - Coronel Portillo - Campoverde"
    },
    {
      "id": "250103",
      "text": "Ucayali - Coronel Portillo - Iparia"
    },
    {
      "id": "250104",
      "text": "Ucayali - Coronel Portillo - Masisea"
    },
    {
      "id": "250105",
      "text": "Ucayali - Coronel Portillo - Yarinacocha"
    },
    {
      "id": "250106",
      "text": "Ucayali - Coronel Portillo - Nueva Requena"
    },
    {
      "id": "250107",
      "text": "Ucayali - Coronel Portillo - Manantay"
    },
    {
      "id": "250201",
      "text": "Ucayali - Atalaya - Raymondi"
    },
    {
      "id": "250202",
      "text": "Ucayali - Atalaya - Sepahua"
    },
    {
      "id": "250203",
      "text": "Ucayali - Atalaya - Tahuania"
    },
    {
      "id": "250204",
      "text": "Ucayali - Atalaya - Yurua"
    },
    {
      "id": "250301",
      "text": "Ucayali - Padre Abad - Padre Abad"
    },
    {
      "id": "250302",
      "text": "Ucayali - Padre Abad - Irazola"
    },
    {
      "id": "250303",
      "text": "Ucayali - Padre Abad - Curimana"
    },
    {
      "id": "250304",
      "text": "Ucayali - Padre Abad - Neshuya"
    },
    {
      "id": "250305",
      "text": "Ucayali - Padre Abad - Alexander Von Humboldt"
    },
    {
      "id": "250401",
      "text": "Ucayali - Purús - Purus"
    }
  ]';

// Convertir el JSON a un array de PHP
$data = json_decode($jsonData, true);
echo $_GET['query'];
// Verificar si se recibió un texto por POST
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $query = $_REQUEST['query'];
    $results = [];

    // Iterar sobre cada elemento en los datos
    foreach ($data as $item) {
        $similarity = 0;
        similar_text(strtolower($query), strtolower($item['text']), $similarity);

        // Si la similitud es mayor que un umbral, añadirlo a los resultados
        if ($similarity > 30) { // Puedes ajustar el umbral según sea necesario
            $results[] = $item;
        }
    }

    // Retornar los resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(['error' => 'No query provided']);
}
?>
