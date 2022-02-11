FROM php:7.4-fpm-buster
LABEL maintainer="ucan-lab <yes@u-can.pro>"
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# cronインストール
RUN apt update
RUN apt-get install -y cron

# cron設定を配置する
COPY ./cron/cron.root /etc/cron.d/cron

# ログを標準出力へ出力できるようにシンボリックリンクを作成する
RUN chmod 0644 /etc/cron.d/cron && ln -sf /proc/1/fd/1 /var/log/cron.log

# フォアグラウンドでcronを起動する
CMD cron -f