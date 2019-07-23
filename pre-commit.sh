EOF
    exit 1
fi

exec git diff-index --check --cached $against --