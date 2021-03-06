toc.dat                                                                                             0000600 0004000 0002000 00000013114 14043624346 0014445 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP           "                y            teste    9.4.26    9.4.26     ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false         ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false         ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false         ?           1262    17136    teste    DATABASE     ?   CREATE DATABASE teste WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE teste;
             postgres    false                     2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false         ?           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    7         ?           0    0    SCHEMA public    ACL     ?   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    7                     3079    11855    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false         ?           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1         ?            1259    17143    products    TABLE     ?   CREATE TABLE public.products (
    id bigint NOT NULL,
    type smallint NOT NULL,
    name character varying NOT NULL,
    price double precision DEFAULT 0 NOT NULL
);
    DROP TABLE public.products;
       public         postgres    false    7         ?            1259    17150    products_id_seq    SEQUENCE     x   CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public       postgres    false    7    173         ?           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
            public       postgres    false    174         ?            1259    17152    taxes    TABLE     ?   CREATE TABLE public.taxes (
    id bigint NOT NULL,
    name character varying NOT NULL,
    percent double precision DEFAULT 0.0 NOT NULL
);
    DROP TABLE public.taxes;
       public         postgres    false    7         ?            1259    17159    taxes_id_seq    SEQUENCE     u   CREATE SEQUENCE public.taxes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.taxes_id_seq;
       public       postgres    false    7    175         ?           0    0    taxes_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.taxes_id_seq OWNED BY public.taxes.id;
            public       postgres    false    176         b           2604    17161    id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    174    173         d           2604    17162    id    DEFAULT     d   ALTER TABLE ONLY public.taxes ALTER COLUMN id SET DEFAULT nextval('public.taxes_id_seq'::regclass);
 7   ALTER TABLE public.taxes ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    176    175         ?          0    17143    products 
   TABLE DATA               9   COPY public.products (id, type, name, price) FROM stdin;
    public       postgres    false    173       2007.dat ?           0    0    products_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.products_id_seq', 4, true);
            public       postgres    false    174         ?          0    17152    taxes 
   TABLE DATA               2   COPY public.taxes (id, name, percent) FROM stdin;
    public       postgres    false    175       2009.dat ?           0    0    taxes_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.taxes_id_seq', 4, true);
            public       postgres    false    176         f           2606    17164    products_pk 
   CONSTRAINT     R   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pk PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pk;
       public         postgres    false    173    173         h           2606    17166    taxes_pk 
   CONSTRAINT     L   ALTER TABLE ONLY public.taxes
    ADD CONSTRAINT taxes_pk PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.taxes DROP CONSTRAINT taxes_pk;
       public         postgres    false    175    175         i           2606    17167    products_taxes_id_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_taxes_id_fk FOREIGN KEY (type) REFERENCES public.taxes(id) ON DELETE CASCADE;
 G   ALTER TABLE ONLY public.products DROP CONSTRAINT products_taxes_id_fk;
       public       postgres    false    1896    175    173                                                                                                                                                                                                                                                                                                                                                                                                                                                            2007.dat                                                                                            0000600 0004000 0002000 00000000137 14043624346 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	1	Produto 1	100
2	2	Produto 2	25.25
3	3	Produto 3	542.98000000000002
4	4	Produto 4	1.99
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                 2009.dat                                                                                            0000600 0004000 0002000 00000000127 14043624346 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Imposto 1	0.01
2	Imposto 2	0.25
3	Imposto 3	1.3200000000000001
4	Imposto 4	0.87
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                         restore.sql                                                                                         0000600 0004000 0002000 00000011315 14043624346 0015373 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;

ALTER TABLE ONLY public.products DROP CONSTRAINT products_taxes_id_fk;
ALTER TABLE ONLY public.taxes DROP CONSTRAINT taxes_pk;
ALTER TABLE ONLY public.products DROP CONSTRAINT products_pk;
ALTER TABLE public.taxes ALTER COLUMN id DROP DEFAULT;
ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
DROP SEQUENCE public.taxes_id_seq;
DROP TABLE public.taxes;
DROP SEQUENCE public.products_id_seq;
DROP TABLE public.products;
DROP EXTENSION plpgsql;
DROP SCHEMA public;
--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.products (
    id bigint NOT NULL,
    type smallint NOT NULL,
    name character varying NOT NULL,
    price double precision DEFAULT 0 NOT NULL
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: taxes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.taxes (
    id bigint NOT NULL,
    name character varying NOT NULL,
    percent double precision DEFAULT 0.0 NOT NULL
);


ALTER TABLE public.taxes OWNER TO postgres;

--
-- Name: taxes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.taxes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.taxes_id_seq OWNER TO postgres;

--
-- Name: taxes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.taxes_id_seq OWNED BY public.taxes.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.taxes ALTER COLUMN id SET DEFAULT nextval('public.taxes_id_seq'::regclass);


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, type, name, price) FROM stdin;
\.
COPY public.products (id, type, name, price) FROM '$$PATH$$/2007.dat';

--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 4, true);


--
-- Data for Name: taxes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.taxes (id, name, percent) FROM stdin;
\.
COPY public.taxes (id, name, percent) FROM '$$PATH$$/2009.dat';

--
-- Name: taxes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.taxes_id_seq', 4, true);


--
-- Name: products_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pk PRIMARY KEY (id);


--
-- Name: taxes_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.taxes
    ADD CONSTRAINT taxes_pk PRIMARY KEY (id);


--
-- Name: products_taxes_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_taxes_id_fk FOREIGN KEY (type) REFERENCES public.taxes(id) ON DELETE CASCADE;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   