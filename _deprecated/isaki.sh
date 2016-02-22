#!/bin/sh

function g()
{
    type=$1;

    printf "\n"

    case ${type} in
        c)
            generateController $2;;
        v)
            generateJS $2 $3
            generateView $2 $3;;
        m)
            generateModel $2;;
        j)
            generateJS $2 $3;;
        mvcj)
            generateModel $2
            generateView $2 $3
            generateController $2
            generateJS $2 $3;;
        s)
            generateSQL $2;;
    esac

    printf "\n"
}

function generateController()
{
    controller=$1
    controllerDir="controllers"
    controllerFile="controllers/${controller}Controller.php"

    if ! [ -f ${controllerFile} ]
    then
        generateAndNotify "php" "${controller}Controller" ${controllerDir}

        printf "<?php\n\n" >> ${controllerFile}
        printf "class ${controller}Controller extends BaseController \n" >> ${controllerFile}
        printf "{ \n" >> ${controllerFile}
        printf "\tpublic function index() { } \n" >> ${controllerFile}
        printf "}" >> ${controllerFile}
    else
        warn "${controller}Controller already exist."
    fi
}

function generateView()
{
    controller=$1
    view=$2
    viewDir="views/${controller}"
    viewFile="views/${controller}/${view}.php"

    if ! [ -d ${viewDir} ]
    then
        generateAndNotify "dir" ${controller} ${viewDir}
    fi

    if ! [ -f ${viewFile} ]
    then
        generateAndNotify "php" ${view} ${viewDir}

        printf "<?php include 'views/partials/header.php' ?>\n\n" >> ${viewFile}
        printf "<?php include 'views/partials/footer.php' ?>" >> ${viewFile}
    else
        warn "${controller}/${view} view already exist."
    fi
}

function generateModel()
{
    model=$(echo $1 | awk '{ print toupper(substr($1, 1, 1)) substr($1, 2) }')
    modelDir="models"
    modelFile="models/${model}.php"

    if ! [ -f ${modelFile} ]
    then
        generateAndNotify "php" ${model} ${modelDir}
        generateSQL "create_$1_table"

        printf "<?php \n\n" >> ${modelFile}
        printf "class ${model} extends BaseDataAccess\n" >> ${modelFile}
        printf "{\n\n" >> ${modelFile}
        printf "}" >> ${modelFile}
    else
        warn "${model} model already exist."
    fi
}

function generateJS()
{
    controller=$1
    view=$2
    jsDir="assets/js/${controller}"
    jsFile="assets/js/${controller}/${view}.js"

    if ! [ -d ${jsDir} ]
    then
        generateAndNotify "dir" ${controller} ${jsDir}
    fi

    if ! [ -f ${jsFile} ]
    then
        generateAndNotify "js" ${view} ${jsDir}

        printf "(function() {\n" >> ${jsFile}
        printf "\talert();\n" >> ${jsFile}
        printf "})();" >> ${jsFile}
    else
        warn "${controller}/${view}.js already exist."
    fi
}

function generateSQL()
{
    name=$1
    sqlDir="sql"

    if ! [ $(ls sql/*_${name}.sql 2>/dev/null | wc -l) -gt 0 ]
    then
        generateAndNotify "sql" ${name} ${sqlDir}
    else
        warn "${name}.sql already exist."
    fi
}

#
# TODO: clean redundancy in code
#
function generateAndNotify()
{
    type=$1
    name=$2
    location=$3

    case ${type} in
        dir)
            mkdir ${location}
            success "created ${type} @ ${location}";;
        sql)
            fullname=$(echo $(date +%m%d%Y%H%M%S)_${name})
            touch "${location}/${fullname}.${type}"
            success "created ${type} @ ${location}/${fullname}.${type}";;
        *)
            touch "${location}/${name}.${type}"
            success "created ${type} @ ${location}/${name}.${type}";;
    esac
}

function warn()
{
    printf "\t\e[0;31m* %s\e[0m\n" "$1"
}

function success()
{
    printf "\t\e[0;32m+ %s %s\t%s %s\e[0m\n" $1
}