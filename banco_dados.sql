--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tb_produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_produtos (
    idproduto integer NOT NULL,
    produto character varying(100),
    preco numeric(10,2),
    dtregistro timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    idtipoproduto integer
);


ALTER TABLE public.tb_produtos OWNER TO postgres;

--
-- Name: tb_produtos_idproduto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_produtos_idproduto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_produtos_idproduto_seq OWNER TO postgres;

--
-- Name: tb_produtos_idproduto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_produtos_idproduto_seq OWNED BY public.tb_produtos.idproduto;


--
-- Name: tb_tipoproduto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_tipoproduto (
    idtipoproduto integer NOT NULL,
    tipoproduto character varying(100),
    dtregister timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    icms numeric(10,2),
    pis numeric(10,2),
    cofins numeric(10,2)
);


ALTER TABLE public.tb_tipoproduto OWNER TO postgres;

--
-- Name: tb_tipoproduto_idtipoproduto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_tipoproduto_idtipoproduto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_tipoproduto_idtipoproduto_seq OWNER TO postgres;

--
-- Name: tb_tipoproduto_idtipoproduto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_tipoproduto_idtipoproduto_seq OWNED BY public.tb_tipoproduto.idtipoproduto;


--
-- Name: tb_vendas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_vendas (
    idvenda integer NOT NULL,
    valor_total numeric(10,2),
    total_impostos numeric(10,2),
    dtregistro timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.tb_vendas OWNER TO postgres;

--
-- Name: tb_vendas_idvenda_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_vendas_idvenda_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_vendas_idvenda_seq OWNER TO postgres;

--
-- Name: tb_vendas_idvenda_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_vendas_idvenda_seq OWNED BY public.tb_vendas.idvenda;


--
-- Name: tb_produtos idproduto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_produtos ALTER COLUMN idproduto SET DEFAULT nextval('public.tb_produtos_idproduto_seq'::regclass);


--
-- Name: tb_tipoproduto idtipoproduto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tipoproduto ALTER COLUMN idtipoproduto SET DEFAULT nextval('public.tb_tipoproduto_idtipoproduto_seq'::regclass);


--
-- Name: tb_vendas idvenda; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_vendas ALTER COLUMN idvenda SET DEFAULT nextval('public.tb_vendas_idvenda_seq'::regclass);


--
-- Data for Name: tb_produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_produtos (idproduto, produto, preco, dtregistro, idtipoproduto) FROM stdin;
8	Arroz	25.00	2024-03-26 14:52:06.61366	11
9	Pão de Forma	10.00	2024-03-26 21:03:37.340377	16
\.


--
-- Data for Name: tb_tipoproduto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_tipoproduto (idtipoproduto, tipoproduto, dtregister, icms, pis, cofins) FROM stdin;
11	Mercearia	2024-03-26 14:51:52.301212	4.00	5.00	2.00
16	Padaria	2024-03-26 21:02:06.650669	5.00	0.65	2.25
17	Frios	2024-03-27 10:51:10.173315	2.10	2.15	2.25
18	Carnes	2024-03-27 11:46:43.708402	5.00	0.65	2.25
19	Hortifruti	2024-03-27 11:52:20.507725	2.10	2.10	2.25
\.


--
-- Data for Name: tb_vendas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_vendas (idvenda, valor_total, total_impostos, dtregistro) FROM stdin;
\.


--
-- Name: tb_produtos_idproduto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_produtos_idproduto_seq', 12, true);


--
-- Name: tb_tipoproduto_idtipoproduto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_tipoproduto_idtipoproduto_seq', 19, true);


--
-- Name: tb_vendas_idvenda_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_vendas_idvenda_seq', 7, true);


--
-- Name: tb_produtos tb_produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_produtos
    ADD CONSTRAINT tb_produtos_pkey PRIMARY KEY (idproduto);


--
-- Name: tb_tipoproduto tb_tipoproduto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_tipoproduto
    ADD CONSTRAINT tb_tipoproduto_pkey PRIMARY KEY (idtipoproduto);


--
-- Name: tb_vendas tb_vendas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_vendas
    ADD CONSTRAINT tb_vendas_pkey PRIMARY KEY (idvenda);


--
-- Name: tb_produtos tb_produtos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_produtos
    ADD CONSTRAINT tb_produtos_fkey FOREIGN KEY (idtipoproduto) REFERENCES public.tb_tipoproduto(idtipoproduto) NOT VALID;


--
-- Name: TABLE tb_produtos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE public.tb_produtos FROM postgres;
GRANT ALL ON TABLE public.tb_produtos TO postgres WITH GRANT OPTION;


--
-- Name: TABLE tb_tipoproduto; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE public.tb_tipoproduto FROM postgres;
GRANT ALL ON TABLE public.tb_tipoproduto TO postgres WITH GRANT OPTION;


--
-- Name: TABLE tb_vendas; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE public.tb_vendas FROM postgres;
GRANT ALL ON TABLE public.tb_vendas TO postgres WITH GRANT OPTION;


--
-- Name: DEFAULT PRIVILEGES FOR TABLES; Type: DEFAULT ACL; Schema: -; Owner: postgres
--

ALTER DEFAULT PRIVILEGES FOR ROLE postgres REVOKE ALL ON TABLES FROM postgres;
ALTER DEFAULT PRIVILEGES FOR ROLE postgres GRANT ALL ON TABLES TO postgres WITH GRANT OPTION;
ALTER DEFAULT PRIVILEGES FOR ROLE postgres GRANT ALL ON TABLES TO wellington WITH GRANT OPTION;


--
-- PostgreSQL database dump complete
--

