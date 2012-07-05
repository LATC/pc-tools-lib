<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Linked Data Publication & Consumption Tool Library</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<link href="tool.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

require_once ('toollibrary.php');
$tool = $_GET["name"];

?>

<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#">LATC Data Publication & Consumption Tools Library</a></h1>
	</div>
	<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="categories.php">Tool Categories</a></li>
			<li class="active"><a href="example.php">Example</a></li>
			<li><a href="screencast.html">Screencast</a></li>
			<li><a href="contact.html">About</a></li>
			<li><a href="http://latc-project.eu" title="LATC" style="background: none; align:right; margin-left: 169px; margin-top: 10px;padding: 7px;"><img src="images/logo-latc.png"/></a></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">

		
		<div class="post">
			<h2 class="title">Example</h2>
			<div class="entry">
                            <p>The following example demonstrates the publication and consumption process for the <a href="http://cordis.europa.eu/">Community Research and Development Information Service</a> (CORDIS).
                            <p>The example makes use of the following tools:
                            <ul>
                              <li><a href="tool.php?name=neologism">Neologism</a></li>
                              <li><a href="tool.php?name=d2rserver">D2R Server</a></li>
                              <li><a href="tool.php?name=silk">Silk Link Discovery Framework</a></li>
                              <li><a href="tool.php?name=relfinder">RelFinder</a></li>
                            </ul>
                            </p>
                            <p>Prerequisites:
                            <ul>
                                <li>The CORDIS data set is originally available in a relational database.</li>
                            </ul>
                            </p>
                            <p>Outline of the step by step publication process:
                                <ol>
                                    <li>Model the ontology for CORDIS using <a href="tool.php?name=neologism">Neologism</a>.</li>
                                    <li>Publish the data set as Linked Data using <a href="tool.php?name=d2rserver">D2R Server</a>. Map the database schema to RDF using the D2RQ Mapping Language.</li>
                                    <li>Find Linked Data sets that thematically overlap with CORDIS and that can be linked to, e.g. on <a href="http://www.ckan.net/group/lodcloud">CKAN</a>.</li>
                                    <li>Use the <a href="tool.php?name=silk">Silk Link Discovery Framework</a> to interlink the data sets and publish the links along with the data set.</li>
                                </ol>
                            </p>
                            <p>Each publication step will be described in detail.
								The Linked Data version of CORDIS can be consumed in different ways. We will show how to set up <a href="tool.php?name=relfinder">RelFinder</a> to explore relations between entities in the CORDIS Linked Data set.
                             </p>
							 
							 
							 <h3 class="title">Prerequisites</h3>
							 
							 <p>The CORDIS data set is originally available in a relational database with the following database schema:</p>
							 <p><img src="images/latc_tl_example_db.png"></p>
							 
							 <h3 class="title">Neologism: Modeling the CORDIS ontology</h3>
							 
							 <p>Set up Neologism as described <a href="tool.php?name=neologism">here</a>.</p>
<p>Login to your Neologism instance.</p>
<p>Create a new vocabulary for CORDIS (<em>Create content > Vocabulary</em>).</p>
<p><img src="images/latc_tl_example_neologism_1.png"></p>
<p>Provide at least the vocabulary ID, title, namespace URI, authors and description of the vocabulary.</p>
<p>For CORDIS provide e.g. the following parameters:
<ul>
<li>Vocabulary ID: 	cordis</li>
<li>Title: 	Community Research and Development Information Service (CORDIS)</li>
<li>Description: 	The CORDIS ontology represents the Community Research and Development Information Service (CORDIS) data set published by the European Union. The data set contains information on EU programmes and projects.</li>
<li>Namespace URI:	http://www4.wiwiss.fu-berlin.de/cordis/resource/cordis/</li>
</ul>
</p>
<p>Then save the vocabulary.</p>
<p><img src="images/latc_tl_example_neologism_2.png"></p>

<p>Create classes for each concept in the data set (<em>Create new class</em> button in vocabulary view).</p>
<p>For CORDIS these are e.g.:
<ul>
<li>Project</li>
<li>Programme</li>
<li>Organization</li>
<li>Person</li>
</ul>
</p>

<p><img src="images/latc_tl_example_neologism_3.png"></p>
 
<p>When adding a class, provide an URI and a label. Furthermore, a description of the class can be added and super classes can be chosen.</p>
<p>For the class Project provide the following parameters:
<ul>
	<li>URI: 	Project (the namespace is already given by the vocabulary namespace)</li>
	<li>Label:	project</li>
	<li>Comment:	A project is a collaborative enterprise involving several project partners.</li>
</ul>
</p>
<p>Then add properties to your classes (<em>Create new property</em> button in vocabulary view). These are class relations as well as class attributes.</p>

<p><img src="images/latc_tl_example_neologism_4.png"></p>

 
<p>An example for a property is the relation between projects and programmes. Therefore define the programme property with the domain cordis:Project and the range cordis:Programme.</p>
<p>Make sure to reuse vocabularies whenever possible. For links to websites containing more information on a concept, use foaf:page instead of defining your own website property.</p>
<p>When the concepts and their properties of the database (or data set) are modelled you can see them in the overview diagram:</p>
 
 <p><img src="images/latc_tl_example_neologism_5.png"></p>

<p>You then can save the modelled vocabulary as N3 or RDF/XML (N3 or RDF/XML icons in vocabulary view).</p>

<p><img src="images/latc_tl_example_neologism_6.png"></p>


<p>Part of the CORDIS vocabulary in N3:</p>
<pre>@prefix rdf: &lt;http://www.w3.org/1999/02/22-rdf-syntax-ns#&gt; .
@prefix owl: &lt;http://www.w3.org/2002/07/owl#&gt; .
@prefix dc: &lt;http://purl.org/dc/elements/1.1/&gt; .
@prefix vann: &lt;http://purl.org/vocab/vann/&gt; .
@prefix foaf: &lt;http://xmlns.com/foaf/0.1/&gt; .
@prefix cordis: &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/cordis/&gt; .
@prefix rdfs: &lt;http://www.w3.org/2000/01/rdf-schema#&gt; .

&lt;http://vocab.deri.ie/cordis&gt; a owl:Ontology;
    dc:title "Community Research and Development Information Service (CORDIS)";
    vann:preferredNamespaceUri "http://www4.wiwiss.fu-berlin.de/cordis/resource/cordis/";
    vann:preferredNamespacePrefix "cordis";
    dc:creator &lt;http://vocab.deri.ie/cordis#anjjen&gt; .

&lt;http://vocab.deri.ie/cordis#anjjen&gt; a foaf:Person;
    foaf:name "Anja Jentzsch";
    foaf:mbox &lt;mailto:mail@anjajentzsch.de&gt; .

&lt;http://vocab.deri.ie/cordis#FU%20Berlin&gt; a foaf:Organization;
    foaf:member &lt;http://vocab.deri.ie/cordis#anjjen&gt;;
    foaf:name "FU Berlin";
    foaf:homepage &lt;http://www.fu-berlin.de/&gt; .

cordis:Project a rdfs:Class, owl:Class;
    rdfs:isDefinedBy &lt;http://vocab.deri.ie/cordis&gt;;
    rdfs:label "Project" .

cordis:Programme a rdfs:Class, owl:Class;
    rdfs:isDefinedBy &lt;http://vocab.deri.ie/cordis&gt;;
    rdfs:label "Programme" .

cordis:programme a rdf:Property;
    rdfs:isDefinedBy &lt;http://vocab.deri.ie/cordis&gt;;
    rdfs:label "programme";
    rdfs:domain cordis:Project;
    rdfs:range cordis:Programme .

...</pre>

<h3 class="title">D2R Server: Publishing the CORDIS data set as Linked Data</h3>
<p>Set up D2R Server as described in <a href="tool.php?name?d2rserver">here</a> until you reach step 3.</p>
<p>Write a <a href="http://www4.wiwiss.fu-berlin.de/bizer/d2rq/spec/#specification">D2RQ mapping file</a> to map your database to the previously defined ontology.</p>
<p>The following excerpt from the CORDIS D2RQ map defines prefixes, the server and database properties as well as the mappings for the cordis:Project and cordis:Programme classes and the ontology property cordis:programme which connects a project with a programme.</p>
<pre>@prefix map: &lt;file:/C:/Cordis/cordis.n3#&gt; .
@prefix cordis: &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/cordis/&gt; .
@prefix foaf: &lt;http://xmlns.com/foaf/0.1/&gt; .
@prefix owl: &lt;http://www.w3.org/2002/07/owl#&gt; .
@prefix rdf: &lt;http://www.w3.org/1999/02/22-rdf-syntax-ns#&gt; .
@prefix rdfs: &lt;http://www.w3.org/2000/01/rdf-schema#&gt; .
@prefix xsd: &lt;http://www.w3.org/2001/XMLSchema#&gt; .
@prefix dc: &lt;http://purl.org/dc/elements/1.1/&gt; .
@prefix d2rq: &lt;http://www.wiwiss.fu-berlin.de/suhl/bizer/D2RQ/0.1#&gt; .
@prefix d2r: &lt;http://sites.wiwiss.fu-berlin.de/suhl/bizer/d2r-server/config.rdf#&gt; .
@prefix vocabClass: &lt;http://www4.wiwiss.fu-berlin.de/cordis/vocab/resource/class/&gt; .
@prefix vocabProperty: &lt;http://www4.wiwiss.fu-berlin.de/cordis/vocab/resource/property/&gt; .

map:Server a d2r:Server;
    rdfs:label "D2R Server publishing the CORDIS data set";
    d2r:baseURI &lt;http://www4.wiwiss.fu-berlin.de/cordis/&gt;;
    d2r:port 2038;
    .

map:database a d2rq:Database;
    d2rq:jdbcDriver "com.mysql.jdbc.Driver";
    d2rq:jdbcDSN "jdbc:mysql://127.0.0.1/cordis?autoReconnect=true";
    d2rq:username "d2r";
    .

map:Projects a d2rq:ClassMap;
    d2rq:dataStorage map:database;
    d2rq:class cordis:Project;
    d2rq:uriPattern "Project/@@projects.projectsref@@";
    d2rq:classDefinitionLabel "project"@en;
    .

map:title a d2rq:PropertyBridge;
    d2rq:belongsToClassMap map:Projects;
    d2rq:column "projects.title";
    d2rq:property rdfs:label;
    .

...

map:project2programme a d2rq:PropertyBridge;
    d2rq:belongsToClassMap map:Projects;
    d2rq:property cordis:programme;
    d2rq:propertyDefinitionLabel "Programme Acronym"@en;
    d2rq:uriPattern "Programme/@@projects.programmeacronym|urlify@@";
    d2rq:join "programmes.acronym = projects.programmeacronym"
    .

map:Programmes a d2rq:ClassMap;
    d2rq:dataStorage map:database;
    d2rq:class cordis:Programme;
    d2rq:uriPattern "Programme/@@programmes.acronym|urlify@@";
    d2rq:classDefinitionLabel "Programme"@en;
    .

...</pre>
<p>Save the D2RQ file as cordis.n3 to your D2R Server directory.</p>
<p>Then test the mapping by starting the server from inside this directory:</p>
<pre>d2r-server.bat cordis.n3</pre>
<p>You should see the server running at http://localhost:2038 now.</p>
<p>If the mapping is complete, you can set up D2R Server as a service. On Windows use the install-service script:</p>
<pre>install-service cordis cordis.n3</pre>
<p>Find the example D2R Server publishing the CORDIS data set as Linked Data <a href="http://www4.wiwiss.fu-berlin.de/cordis/">online</a>.</p>

<h3 class="title">CKAN: Find thematically overlapping Linked Data sets</h3>
<p>Even if you already know Linked Data sets CORDIS can be interlinked with, you should explore the data sets on <a href="http://ckan.net/group/lodcloud">CKAN</a>.</p>
<p>As an example we choose DBpedia  as a link target. Since DBpedia covers a lot of domains, we can interlink many entities in CORDIS and DBpedia. Suitable entity types for interlinking are e.g.: EU projects, EU programmes, organizations, countries, persons.</p>

<h3 class="title">Silk Link Discovery Framework: Interlinking the CORDIS Linked Data set</h3>
<p>Set up Silk Single Machine as described <a href="tool.php?name=silk">here</a>.</p>
<p>As an example we write a <a href="http://www4.wiwiss.fu-berlin.de/bizer/silk/spec/">Silk link specification</a> file for EU projects in CORDIS and <a href="http://dbpedia.org">DBpedia</a>. In both data sets we restrict the data set to EU projects with the <RestrictTo> element. We then require the label or acronym to match as well as either the website or EU project reference number. The minimum similarity of two data items which is required to generate a link between them is set to 95% in the <Filter> element, while only links between items with a similarity higher than 98% is written to the resulting link set, while the links below 98% are written to a verify file.</p>
<p>The following listing is the resulting Silk link specfication:</p>
<pre>&lt;?xml version="1.0" encoding="utf-8" ?&gt;
&lt;Silk&gt;
  &lt;Prefixes&gt;	
...
  &lt;/Prefixes&gt;

  &lt;DataSources&gt;
    &lt;DataSource id="dbpedia" type="sparqlEndpoint"&gt;
      &lt;Param name="endpointURI" value="http://dbpedia.org/sparql" /&gt;
      &lt;Param name="graph" value="http://dbpedia.org" /&gt;
    &lt;/DataSource&gt;

    &lt;DataSource id="cordis" type="sparqlEndpoint"&gt;
      &lt;Param name="endpointURI" value="http://www4.wiwiss.fu-berlin.de/cordis/sparql" /&gt;
    &lt;/DataSource&gt;
  &lt;/DataSources&gt;

  &lt;Interlinks&gt;
    &lt;Interlink id="projects"&gt;
      &lt;LinkType&gt;owl:sameAs&lt;/LinkType&gt;

      &lt;SourceDataset dataSource="dbpedia" var="a"&gt;
        &lt;RestrictTo&gt;
          ?a dbpedia-prop:wikiPageUsesTemplate &lt;http://dbpedia.org/resource/Template:Research-Project&gt;
        &lt;/RestrictTo&gt;
      &lt;/SourceDataset&gt;

      &lt;TargetDataset dataSource="cordis" var="b"&gt;
        &lt;RestrictTo&gt;
          ?b rdf:type cordis:Project
        &lt;/RestrictTo&gt;
      &lt;/TargetDataset&gt;

      &lt;LinkCondition&gt;
        &lt;Aggregate type="average"&gt;
          &lt;Aggregate type="max"&gt;
            &lt;Compare metric="levenshtein"&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?a/rdfs:label" /&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?b/rdfs:label" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="levenshtein"&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;TransformInput function="replace"&gt;
                  &lt;TransformInput function="stripUriPrefix"&gt;
                    &lt;Input path="?a\dbpedia-prop:redirect" /&gt;
                  &lt;/TransformInput&gt;
                  &lt;Param name="search" value="_" /&gt;
                  &lt;Param name="replace" value=" " /&gt;
                &lt;/TransformInput&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?b/rdfs:label" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="levenshtein"&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?a/dbpedia-prop:title" /&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?b/rdfs:label" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="levenshtein"&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?a/rdfs:label" /&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?b/cordis:acronym" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="levenshtein"&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;TransformInput function="replace"&gt;
                  &lt;TransformInput function="stripUriPrefix"&gt;
                    &lt;Input path="?a\dbpedia-prop:redirect" /&gt;
                  &lt;/TransformInput&gt;
                  &lt;Param name="search" value="_" /&gt;
                  &lt;Param name="replace" value=" " /&gt;
                &lt;/TransformInput&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?b/cordis:acronym" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="levenshtein"&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?a/dbpedia-prop:title" /&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="lowerCase"&gt;
                &lt;Input path="?b/cordis:acronym" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
          &lt;/Aggregate&gt;
          &lt;Aggregate type="max"&gt;
            &lt;Compare metric="equality"&gt;
              &lt;TransformInput function="stripPostfix"&gt;
                &lt;Input path="?a/dbpedia-prop:website" /&gt;
                &lt;Param name="postfix" value="/" /&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="stripPostfix"&gt;
                &lt;Input path="?b/foaf:page" /&gt;
                &lt;Param name="postfix" value="/" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="equality"&gt;
              &lt;TransformInput function="regexReplace"&gt;
                &lt;Input path="?a/dbpedia-prop:projectreference" /&gt;
                &lt;Param name="regex" value="^([^-])*-*0*([0-9]*)\s*$" /&gt;
                &lt;Param name="replace" value="$2" /&gt;
              &lt;/TransformInput&gt;
              &lt;TransformInput function="regexReplace"&gt;
                &lt;Input path="?b/cordis:reference" /&gt;
                &lt;Param name="regex" value="^0*" /&gt;
                &lt;Param name="replace" value="" /&gt;
              &lt;/TransformInput&gt;
            &lt;/Compare&gt;
            &lt;Compare metric="equality"&gt;
              &lt;Input path="?a/dbpedia-prop:projectreference" /&gt;
              &lt;Input path="?b/cordis:reference" /&gt;
            &lt;/Compare&gt;
          &lt;/Aggregate&gt;
        &lt;/Aggregate&gt;
      &lt;/LinkCondition&gt;

      &lt;Filter threshold="0.95" /&gt;

      &lt;Outputs&gt;
        &lt;Output maxConfidence="0.98" type="file" &gt;
          &lt;Param name="file" value="cordis_dbpedia_projects_verify_links.xml"/&gt;
          &lt;Param name="format" value="alignment"/&gt;
        &lt;/Output&gt;
        &lt;Output minConfidence="0.98" type="file"&gt;
          &lt;Param name="file" value="cordis_dbpedia_projects_links.xml"/&gt;
          &lt;Param name="format" value="ntriples"/&gt;
        &lt;/Output&gt;
      &lt;/Outputs&gt;
    &lt;/Interlink&gt;
  &lt;/Interlinks&gt;
&lt;/Silk&gt;</pre>
<p>Save the link specification as <tt>silk_cordis_dbpedia.xml</tt>. Then got to the directory where you put the Silk Single Machine jar file and run:</p>
<pre>java -DconfigFile=silk_cordis_dbpedia.xml -jar silk.jar</pre>
<p>The resulting 17 links are written into the <tt>cordis_dbpedia_projects_links.xml</tt> file:</p> 
<pre>&lt;http://dbpedia.org/resource/DAIDALOS&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/71242&gt; .
&lt;http://dbpedia.org/resource/SeCSE&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/72081&gt; .
&lt;http://dbpedia.org/resource/IMAQUANIM&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/75943&gt; .
&lt;http://dbpedia.org/resource/SALERO&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/79378&gt; .
&lt;http://dbpedia.org/resource/Stasis_%28EU_project%29&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/79477&gt; .
&lt;http://dbpedia.org/resource/BEinGRID&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/79512&gt; .
&lt;http://dbpedia.org/resource/SUPER&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/79373&gt; .
&lt;http://dbpedia.org/resource/AssessGrid&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/79340&gt; .
&lt;http://dbpedia.org/resource/EMANICS&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/80625&gt; .
&lt;http://dbpedia.org/resource/DAIDALOS&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/80687&gt; .
&lt;http://dbpedia.org/resource/UNIC_%E2%80%93_UNIversal_satellite_home_Connection&gt;
  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/80627&gt; .
&lt;http://dbpedia.org/resource/RESERVOIR&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/85304&gt; .
&lt;http://dbpedia.org/resource/TREAT-NMD&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/84926&gt; .
&lt;http://dbpedia.org/resource/SOA4All&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/85536&gt; .
&lt;http://dbpedia.org/resource/SecureChange&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/89030&gt; .
&lt;http://dbpedia.org/resource/ONTORULE&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt; 
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/89260&gt; .
&lt;http://dbpedia.org/resource/PRoVisG&gt;  &lt;http://www.w3.org/2002/07/owl#sameAs&gt;
  &lt;http://www4.wiwiss.fu-berlin.de/cordis/resource/Project/89375&gt; .</pre>
Import the links into a database table (e.g. <tt>cordis_dbpedia_projects</tt>) by seperating source and target into different columns and add the according property mapping to your D2RQ map: 
<pre>map:ProjectDBpediaLink a d2rq:PropertyBridge;
	d2rq:belongsToClassMap map:Projects;
	d2rq:property owl:sameAs;
	d2rq:propertyDefinitionLabel "DBpedia link"@en;
	d2rq:join "projects.projectsref = cordis_dbpedia_projects.project_id";
	d2rq:uriColumn "cordis_dbpedia_projects.dbpedia_url";
	.</pre>
<p>Your D2R Server for CORDIS now also serves the links for EU projects in DBpedia as Linked Data.</p>

<h3 class="title">RelFinder: Explore the CORDIS Linked Data set</h3>

<p>For exploring the CORDIS Linked Data set we use <a href="tool.php?name=relfinder">RelFinder</a>. Instead of using the showcase version as described <a href="tool.php?name=relfinder">here</a>, we set up a separate RelFinder version especially for CORDIS. The instructions on setting up the RelFinder are online at <a href="http://relfinder.dbpedia.org/integrating.html">http://relfinder.dbpedia.org/integrating.html</a>.</p>
<p>Try your RelFinder version by pointing your web browser to the URL where you set up RelFinder. Then add 2 to n entity names into the RelFinder <em>between</em> form. Then define the maximum path length between these entities and click the <em>Find Relations</em> button.</p>
<p>You can find the RelfFinder for CORDIS online at: <a href="http://www4.wiwiss.fu-berlin.de/cordis/relfinder/RelFinder.swf">http://www4.wiwiss.fu-berlin.de/cordis/relfinder/RelFinder.swf</a>.</p>

			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li id="search">
				<h2><b>Search</b></h2>
				<form method="get" action="">
					<fieldset>
					<input type="text" id="s" name="s" value="" />
					<input type="submit" id="x" value="Search" />
					</fieldset>
				</form>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<div class="wrap">
		<div id="fbox1" class="box2">
			<h2></h2>
			<p></p>
		</div>
		<div id="fbox2" class="box2">
			<h2></h2>
			<p></p>
		</div>
		<div id="fbox3" class="box2">
			<h2></h2>
			<p></p>
		</div>
	</div>
</div>
<!-- end footer -->
</body>
</html>
