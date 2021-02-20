# webtutorial
웹해킹 실습을 위한 간단한 게시판 구축

## 구축 요소
 * 로그인/회원가입
 * 게시글 생성/삭제/수정
 * 댓글 생성
 * 파일 업로드/다운로드

## lib.php
 해당 파일에는 php와 mysql을 연결하는 mysqli_connect()함수가 정의되어있고, 이 파일을 다른 파일들이 include하고 있다.
 mysqli_connect('ip', 'DB아이디', 'DB비밀번호', 'DB스키마')를 본인의 것에 맞게 설정해야한다.
