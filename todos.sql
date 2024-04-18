-- Database: practice

-- DROP DATABASE IF EXISTS practice;

CREATE DATABASE practice
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

-- SCHEMA: public

-- DROP SCHEMA IF EXISTS public ;

CREATE SCHEMA IF NOT EXISTS public
    AUTHORIZATION postgres;

COMMENT ON SCHEMA public
    IS 'standard public schema';

GRANT ALL ON SCHEMA public TO PUBLIC;

GRANT ALL ON SCHEMA public TO postgres;

-- Table: public.todos

-- DROP TABLE IF EXISTS public.todos;

CREATE TABLE IF NOT EXISTS public.todos
(
    id integer NOT NULL DEFAULT nextval('todos_id_seq'::regclass),
    task character varying(255) COLLATE pg_catalog."default" NOT NULL,
    category_id integer,
    note text COLLATE pg_catalog."default",
    completed boolean DEFAULT false,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT todos_pkey PRIMARY KEY (id),
    CONSTRAINT fk_category_id FOREIGN KEY (category_id)
        REFERENCES public.categories (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.todos
    OWNER to postgres;

-- Table: public.categories

-- DROP TABLE IF EXISTS public.categories;

CREATE TABLE IF NOT EXISTS public.categories
(
    id integer NOT NULL DEFAULT nextval('categories_id_seq'::regclass),
    name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT categories_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.categories
    OWNER to postgres;